<?php

namespace Src\Core\Repositories;

use Src\Core\Domains\Entities\SubscribeEntity;

interface SubscribesRepository {
    public function create(SubscribeEntity $subscribe);

}