<?php

namespace Src\Core\Domains\Usecases;

require_once __DIR__ . "/../../../application/utils/Response.php";
require_once __DIR__ . "/../../../core/repositories/PlaceRepository.php";

use Src\Application\Utils\Response;
use Src\Core\Repositories\PlaceRepository;

class GetPlacesUseCase {
    public function __construct(private PlaceRepository $repository) {}
 
    public function execute() {
        $places = $this->repository->getPlaces();

        return Response::json(
            [
                "success" => true,
                "data" => $places
            ],
            200
        );
    }
}