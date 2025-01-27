<?php

require_once __DIR__ . "/../db/Database.php";

class HouseModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function create(string $name, string $description, string $address, string $city, string $state, int $price, int $rooms, int $capacity, string $images_url) {
        $query = $this->db->query(
            "INSERT INTO houses (id, name, description, address, city, state, price, rooms, capacity, images_url) VALUES (:id, :name, :description, :address, :city, :state, :price, :rooms, :capacity, :images_url)"
        );
        
        $id = uniqid();
        $query->bindParam(":id", $id);
        $query->bindParam(":name", $name);
        $query->bindParam(":description", $description);
        $query->bindParam(":address", $address);
        $query->bindParam(":city", $city);
        $query->bindParam(":state", $state);
        $query->bindParam(":price", $price);
        $query->bindParam(":rooms", $rooms);
        $query->bindParam(":capacity", $capacity);
        $query->bindParam(":images_url", $images_url);

        return $query->execute();
    }

    public function findById(string $id) {
        $query = $this->db->query("SELECT * FROM houses WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
    
        return $query->fetch();
    }
}