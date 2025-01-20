<?php

use Src\Core\Domains\Usecases\UpdatePlaceUseCase;
use Src\Infra\Repositories\PlaceRepositoryImpl;

class UpdatePlaceController {
    public function execute() {
        $body = json_decode(file_get_contents('php://input'), true);

        $body["id"] = $_GET["id"];

        $useCase = new UpdatePlaceUseCase(new PlaceRepositoryImpl());

        $output = $useCase->execute($body);

        echo $output;
    }
}