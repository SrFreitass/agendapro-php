<?php

require_once __DIR__ . "/../infra/models/userModel.php";
require_once __DIR__ . "/../middlewares/AdminMiddleware.php";

AdminMiddleware();

class DeleteUserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new userModel();
    }

    public function handle() {
        if(!isset($_GET["id"])) {
            return header("Location: ../views/home?error=missing_fields");
        }

        $user = $this->userModel->findById($_GET["id"]);

        if(!$user) {
            return header("Location: ../views/home?error=user_not_found");
        }

        $this->userModel->deleteById($_GET["id"]);

        header("Location: ../views/admin/users.php");
        
    }
}