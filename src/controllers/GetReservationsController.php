<?php

require_once __DIR__ . "/../infra/models/ReservationModel.php";
require_once __DIR__ . "/../infra/models/HouseModel.php";
require_once __DIR__ . "/../middlewares/LoggedMiddleware.php";

loggedMiddleware();

class GetReservationsController {
    private $reservationModel; 

    public function __construct() {
        $this->reservationModel = new ReservationModel();
    }

    public function handle() {
      return $this->reservationModel->findAll();
    }
}