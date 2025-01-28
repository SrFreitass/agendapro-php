<?php

require_once __DIR__ . "/../infra/models/ReservationModel.php";
require_once __DIR__ . "/../middlewares/AdminMiddleware.php";

loggedMiddleware();

class DeleteReservationByUserController {
    private $reservationModel;

    public function __construct() {
        $this->reservationModel = new ReservationModel();
    }

    public function handle() {
        $reservation = $this->reservationModel->findById($_GET["id"]);

        $user_id = $_SESSION["user_id"];

        if ($reservation["user_id"] != $user_id) {
            header("Location: ../views/reservations?error.php");
        }

        $this->reservationModel->deleteById($_GET["id"]);
        return header("Location: ../views/reservations?success.php");
    }
}