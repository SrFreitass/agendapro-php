<?php

use Src\Infra\Repositories\ReservationRepositoryImpl;

require_once __DIR__ . "/../../core/domains/usecases/DeleteReservationUseCase.php";
require_once __DIR__ . "/../../infra/repositories/ReservationRepository.php";

class DeleteReservationController {
    public function execute() {
        $useCase = new DeleteReservationUseCase(new ReservationRepositoryImpl());

        $reservationId = $_GET["id"];
    
        $output = $useCase->execute($reservationId);

        echo $output;
    }
}