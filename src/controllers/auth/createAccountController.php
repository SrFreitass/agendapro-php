<?php

require_once __DIR__ . "/../../infra/models/UserModel.php";
require_once __DIR__ . "/../../middlewares/notLoggedMiddleware.php";


class CreateAccountController {
    private $userModel;
    
    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function handle() {
        notLoggedMiddleware();
        
        if(
            !isset($_POST["name"]) ||
            !isset($_POST["email"]) ||
            !isset($_POST["password"])
        ) {
            return header("Location: ../views/auth/signup.php?error=missing_fields");
        }

        if(
            $this->userModel->findByEmail($_POST["email"])
        ) {
            return header("Location: ../views/auth/signup.php?error=email_already_exists");
        }

        $password_hash = password_hash($_POST["password"], PASSWORD_BCRYPT);

        $user_id = uniqid();

        $res = $this->userModel->create(
            $user_id,
            $_POST["name"],
            $_POST["email"],
            $password_hash,
            "https://i.pinimg.com"
        );

        if(!$res) {
            return header("Location: ../views/auth/signup.php?error=internal_error");
        }

        $_SESSION["user_id"] = $user_id;

        return header("Location: ../views/home");
    }
}