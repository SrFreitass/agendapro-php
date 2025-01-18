<?php

namespace Src\Core\Repositories;

require_once __DIR__ . "/../domains/entities/PlaceEntity.php";

use Src\Core\Domains\Entities\PlaceEntity;

interface PlaceRepository {
    public function createPlace(PlaceEntity $place);

    public function getPlaces();
}