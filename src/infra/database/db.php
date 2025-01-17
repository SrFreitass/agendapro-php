<?php

namespace Src\Infra\Database;

use PDO;

class Database {
    public PDO $pdo;

    public function __construct() {
        $this->pdo = new PDO("");
    }
}