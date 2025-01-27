<?php

require_once __DIR__ . "/../infra/models/HouseModel.php";
require_once __DIR__ .  "/../infra/models/ReservationModel.php";
require_once __DIR__ . "/../infra/models/UserModel.php";
require_once __DIR__ . "/../middlewares/AdminMiddleware.php";

AdminMiddleware();

class GetMetricsController {
    private $houseModel;
    private $reservationModel;
    private $userModel;
    
    public function __construct() {
        $this->houseModel = new HouseModel();
        $this->reservationModel = new ReservationModel();
        $this->userModel = new UserModel();
    }

    public function handle() {
        $houses_count = $this->houseModel->count()["total"];
        $reservations_count = $this->reservationModel->count()["total"];
        $users_count = $this->userModel->count()["total"];
        $reservations_monthly = $this->reservationModel->countMonthly();
        $reservations_months = $this->reservationModel->countReservationsByMonth();

        return [
            "houses_count" => $houses_count,
            "reservations_count" => $reservations_count,
            "users_count" => $users_count,
            "reservations_monthly"=> $reservations_monthly,
            "reservations_months" => $reservations_months
        ];
    }
    
}