<?php

namespace Src\Core\Domains\Entities;

use DateTime;

class PlaceEntity {
    public string $id;
    public string $name;
    public string $description;
    public int $capacity;
    public string $image_url;
    public string $created_by;
    public int $created_at;
    public int $updated_at;
    private DateTime $current_date;
    public bool $active;

    public function __construct(string $name, string $description, int $capacity, string $image_url, string $created_by, bool $active = true) {
        $this->id = uniqid();
        $this->name = $name;
        $this->description = $description;
        $this->capacity = $capacity;
        $this->image_url = $image_url;
        $this->created_by = $created_by;

        $this->current_date = new DateTime();

        $this->created_at = $this->current_date->getTimestamp();
        $this->updated_at = $this->current_date->getTimestamp();
        $this->active = $active;
    }
}