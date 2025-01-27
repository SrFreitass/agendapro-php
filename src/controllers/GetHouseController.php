<?php
require_once __DIR__ . "/../infra/models/HouseModel.php";
require_once __DIR__ . "/../middlewares/LoggedMiddleware.php";

LoggedMiddleware();

class GetHouseController {
    private $houseModel;

    public function __construct() {
        $this->houseModel = new HouseModel();
    }

    public function handle() {

        if(empty($_GET["id"])) {
            return header("Location: ../views/home.php?error=missing_fields");
        }
    
        return $this->houseModel->findById($_GET["id"]);
    }
}