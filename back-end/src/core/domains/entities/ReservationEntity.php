<?php

namespace Src\Core\Domains\Entities;

class ReservationEntity {
    public string $id;
    public string $user_id;
    public string $place_id;
    public string $datetime;
    public bool $active;

    public function __construct(string $id, string $user_id, string $place_id, string $datetime) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->place_id = $place_id;
        $this->datetime = $datetime;
        $this->active = true;
    }
}