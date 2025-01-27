<?php

require_once __DIR__ . "/../infra/models/userModel.php";
require_once __DIR__ . "/../infra/models/HouseModel.php";
require_once __DIR__ . "/../middlewares/AdminMiddleware.php";

AdminMiddleware();

class GetUsersController {
    private $userModel; 

    public function __construct() {
        $this->userModel = new userModel();
    }

    public function handle() {
      return $this->userModel->findAll();
    }
}