<?php

namespace Src\Core\Repositories;

require_once __DIR__ . "/../domains/entities/PlaceEntity.php";

use Src\Core\Domains\Entities\PlaceEntity;

interface PlaceRepository {
    public function createPlace(PlaceEntity $place);

    public function getPlaces();

    public function getPlace(string $id);

    public function getPlaceWithReservations(string $id);

    public function updatePlace(string $id, PlaceEntity $place);

    public function deletePlace(string $id);
}