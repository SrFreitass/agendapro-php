<?php

namespace Src\Core\Repositories;

use Src\Core\Domains\Entities\UserEntity;

interface UserRepository {
    public function create(UserEntity $userEntity): bool;

    public function get(string $id = "", string $email = "");

}