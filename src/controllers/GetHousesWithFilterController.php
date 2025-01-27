<?php
require_once __DIR__ . "/../infra/models/HouseModel.php";
require_once __DIR__ . "/../middlewares/LoggedMiddleware.php";

LoggedMiddleware();

class GetHousesWithFilterController {
    private $houseModel;

    public function __construct() {
        $this->houseModel = new HouseModel();
    }

    public function handle() {

        if(
            !isset($_GET["name"]) &&
            !isset($_GET["price"]) &&
            !isset($_GET["capacity"]) 
        ) {
            return header("Location: ../views/home.php?error=missing_fields");
        }
        
        if(
            !empty( $_GET["name"] )
        ) {
            return $this->houseModel->findByName($_GET["name"]);
        }

        if(
            !empty( $_GET["price"] )
        ) {
            return $this->houseModel->findByPrice($_GET["price"]);
        }

        if(
            !empty( $_GET["capacity"] )
        ) {
            return $this->houseModel->findByCapacity($_GET["capacity"]);
        }
    
        return $this->houseModel->findAll();
    }
}