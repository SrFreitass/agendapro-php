<?php

require_once __DIR__ . "/../infra/models/houseModel.php";
require_once __DIR__ . "/../middlewares/AdminMiddleware.php";

AdminMiddleware();

class DeleteHouseController {
    private $houseModel;

    public function __construct() {
        $this->houseModel = new houseModel();
    }

    public function handle() {
        $this->houseModel->deleteById($_GET["id"]);

        header("Location: ../views/admin/houses.php");
    }
}