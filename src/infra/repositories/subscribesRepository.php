<?php

use Src\Core\Repositories\SubscribesRepository;
use Src\Core\Domains\Entities\SubscribeEntity;
use Src\Infra\Database\Database;

class SubscribesRepositoryImpl implements SubscribesRepository {
    public Database $db;

    function __construct() {
        $this->db = new Database();
    }

    public function create(SubscribeEntity $subscribe) {
        
    }
}