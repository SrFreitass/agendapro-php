<?php

require_once __DIR__ . "/../infra/models/userModel.php";

class DeleteUserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new userModel();
    }

    public function handle() {
        $this->userModel->deleteById($_GET["id"]);
    }
}