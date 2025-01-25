<?php

class Database {
    private PDO $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=localhost;dbname=agendapro_db", "root", "");
    }

    public function query(String $sql) {
        return $this->db->prepare($sql);
    }
}