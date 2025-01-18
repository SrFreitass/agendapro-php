<?php

namespace Src\Application\Controllers;

require_once __DIR__ . "/../../infra/repositories/PlaceRepository.php";
require_once __DIR__ . "/../../core/domains/usecases/GetPlacesUseCase.php";

use Src\Core\Domains\Usecases\GetPlacesUseCase;
use Src\Infra\Repositories\PlaceRepositoryImpl;

class GetPlacesController {
    public function execute() {
        $useCase = new GetPlacesUseCase(
            new PlaceRepositoryImpl()
        );

        $output = $useCase->execute();
        
        echo $output;
    }
}