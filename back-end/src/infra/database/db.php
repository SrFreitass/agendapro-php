<?php

namespace Src\Infra\Database;

use PDO;

class Database {
    private PDO $pdo;

    public function query(string $query) {
        return $this->pdo->prepare($query);
    }

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=agendapro_db", "root", "");
    }
}