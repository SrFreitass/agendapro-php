<?php

namespace Src\Core\Domains\Entities;

class SubscribeEntity {
    public int $id;

    public string $name;
    public string $authorization;

    public function __construct(int $id, string $authorization) {
        $this->id = $id;
        $this->authorization = $authorization;
    }
}