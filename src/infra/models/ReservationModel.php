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

    public function findAll() {
        $query = $this->db->query("SELECT reservations.id as id, users.name as user_name, houses.name as house_name, check_in, check_out FROM reservations INNER JOIN houses ON reservations.house_id = houses.id INNER JOIN users ON reservations.user_id = users.id WHERE reservations.is_deleted = 0 AND houses.is_deleted = 0 AND users.is_deleted = 0");
        $query->execute();
    
        return $query->fetchAll();
    }

    public function findByHouseId(string $id) {
        $query = $this->db->query("SELECT * FROM reservations WHERE house_id = :id AND is_deleted = 0");
        $query->bindParam(":id", $id);
        $query->execute();
    
        return $query->fetchAll();
    }

    public function deleteById(string $id) {
        $query = $this->db->query("UPDATE reservations SET is_deleted = 1 WHERE id = :id");
        $query->bindParam(":id", $id);
    
        return $query->execute();
    }

    public function count() {
        $query = $this->db->query("SELECT COUNT(*) as total FROM reservations WHERE is_deleted = 0");
        $query->execute();
    
        return $query->fetch();
    }

    public function countMonthly() {
        $query = $this->db->query("SELECT COUNT(*) as total FROM reservations WHERE MONTH(check_in) = MONTH(CURRENT_DATE()) AND YEAR(check_in) = YEAR(CURRENT_DATE()) AND is_deleted = 0");
        $query->execute();
    
        return $query->fetch();
    }

    public function countReservationsByMonth() {
        $query = $this->db->query("
        SELECT DATE_FORMAT(check_in, '%Y-%m') AS month, COUNT(*) AS total
        FROM reservations
        WHERE YEAR(check_in) = YEAR(CURRENT_DATE()) AND is_deleted = 0
        GROUP BY month;
        ");
        $query->execute();
    
        return $query->fetchAll();
    }
}