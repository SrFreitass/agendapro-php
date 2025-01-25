<?php

require_once __DIR__ . "/../../infra/models/UserModel.php";
require_once __DIR__ . "/../../middlewares/notLoggedMiddleware.php";

notLoggedMiddleware();

class SignInController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function handle() {
        if(
            !isset($_POST["name"]) ||
            !isset($_POST["email"]) ||
            !isset($_POST["password"])
        ) {
            return header("Location: ./?error=missing_fields");
        }

        $user = $this->userModel->findByEmail($_POST["email"]);

        if(
            !$user
        ) {
            return header("Location: ./?error=email_or_password_incorrect");
        }

        if(!password_verify($_POST["password"], $user->password)) {
            return header("Location: ./?error=email_or_password_incorrect");
        };
        
        $_SESSION["user_id"] = $user->id;

        return header("Location: ../views/home");
    }
}