<?php

namespace Src\Application\Controllers;

require_once __DIR__ . "/../../core/domains/usecases/CreateReservationUseCase.php";
require_once __DIR__ . "/../../infra/repositories/PlaceRepository.php";
require_once __DIR__ . "/../../infra/repositories/ReservationRepository.php";

use Src\Core\Domains\Usecases\CreateReservationUseCase;
use Src\Infra\Repositories\PlaceRepositoryImpl;
use Src\Infra\Repositories\ReservationRepositoryImpl;

class CreateReservationController {
    public function execute() {
        $body = json_decode(file_get_contents('php://input'), true);

        $useCase = new CreateReservationUseCase(new ReservationRepositoryImpl(), new PlaceRepositoryImpl());

        $output = $useCase->execute($body);

        echo $output;
    }
}