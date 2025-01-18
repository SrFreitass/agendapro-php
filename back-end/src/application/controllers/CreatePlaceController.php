<?php


namespace Src\Application\Controllers;

require_once __DIR__ . "/../../core/domains/usecases/CreatePlaceUseCase.php";
require_once __DIR__ . "/../../infra/repositories/PlaceRepository.php";

use CreatePlaceUseCase;
use PlaceRepositoryImpl;

class CreatePlaceController {
    public function execute() {
        $body = json_decode(file_get_contents('php://input'), true);
        
        $useCase = new CreatePlaceUseCase(
            new PlaceRepositoryImpl()
        );

        $output = $useCase->execute(body: $body);
        
        echo $output;
    }
}