<?php

namespace Src\Core\Repositories;

use Src\Core\Domains\Entities\ReservationEntity;

interface ReservationRepository {
    public function get(string $id);

    public function create(ReservationEntity $reservationEntity): bool;

    public function delete(string $id) : bool;

}