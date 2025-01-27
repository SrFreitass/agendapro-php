<?php

require_once __DIR__ . "/../infra/models/ReservationModel.php";

class DeleteReservationController {
    private $reservationModel;

    public function __construct() {
        $this->reservationModel = new ReservationModel();
    }

    public function handle() {
        $this->reservationModel->deleteById($_GET["id"]);
    }
}