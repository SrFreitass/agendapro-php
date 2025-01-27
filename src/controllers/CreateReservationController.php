<?php

require_once __DIR__ . "/../infra/models/ReservationModel.php";
require_once __DIR__ . "/../infra/models/HouseModel.php";
require_once __DIR__ . "/../middlewares/LoggedMiddleware.php";

loggedMiddleware();

class CreateReservationController {
    private $reservationModel; 
    private $houseModel;

    public function __construct() {
        $this->reservationModel = new ReservationModel();
        $this->houseModel = new HouseModel();
    }

    public function handle() {
        if(
            !$_POST["house_id"] ||
            !$_POST["check_in"] ||
            !$_POST["check_out"] ||
            !$_POST["guests"] 
        ) {
            return header("Location: ../views/place?id=" . $_POST["house_id"] . "&error=missing_fields");
        }

        
        $house = $this->houseModel->findById($_POST["house_id"]);

        if(!$house) {
            return header("../views/place?id=" . $_POST["house_id"] . "&error=house_not_found");
        }

        if($house["capacity"] < $_POST["guests"]) {
            return header("Location: ../views/place?id=" . $_POST["house_id"] . "&error=house_not_available");
        }

        $reservations = $this->reservationModel->findByHouseId($_POST["house_id"]);

        $check_in = strtotime($_POST["check_in"]);
        $check_out = strtotime($_POST["check_out"]);


        $nights = ($check_out - $check_in) / 86400;

        echo $nights;

        if(is_array($reservations)) {

            foreach ( $reservations as $reservation ) {
                $reservation["check_in"] = strtotime($reservation["check_in"]);
                $reservation["check_out"] = strtotime($reservation["check_out"]);
    
                if(
                    $check_in >= $reservation["check_in"] && $check_out <= $reservation["check_out"]
                ) {
                    return header("Location: ../views/place?id=" . $_POST["house_id"] . "&error=house_not_available");
                }
            }

        }

        if(!isset($_POST["description"])) {
            $_POST["description"] = "Nenhuma descrição";
        }

        echo $nights * $house["price"];

        $this->reservationModel->create(
            $_POST["house_id"],
            $_SESSION["user_id"],
            $_POST["check_in"],
            $_POST["check_out"],
            $_POST["description"],
            $nights * $house["price"]
        );

        return header("Location: ../views/home");
    }
}