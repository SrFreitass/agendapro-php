<?php

require_once __DIR__ . "/../db/Database.php";

class ReservationModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function create(string $house_id, string $user_id, string $check_in, string $check_out, string $message, int $total_price) {
        $query = $this->db->query(
            "INSERT INTO reservations(id, house_id, user_id, check_in, check_out, message, total_price) VALUES (:id, :house_id, :user_id, :check_in, :check_out, :message, :total_price)"        
        );
        
        $id = uniqid();
        $query->bindParam(":id", $id);
        $query->bindParam(":house_id", $house_id);
        $query->bindParam(":user_id", $user_id);
        $query->bindParam(":check_in", $check_in);
        $query->bindParam(":check_out", $check_out);
        $query->bindParam(":message", $message);
        $query->bindParam(":total_price", $total_price);
    

        return $query->execute();
    }

    public function findByHouseId(string $id) {
        $query = $this->db->query("SELECT * FROM reservations WHERE house_id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
    
        return $query->fetchAll();
    }
}