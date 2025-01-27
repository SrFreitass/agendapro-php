<?php

require_once __DIR__ . "/../db/Database.php";

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function create(string $id, string $name, string $email, string $password, string $avatar) {
        $query = $this->db->query("INSERT INTO users (id, name, email, password, avatar_url) VALUES (:id, :name, :email, :password, :avatar)");
        $query->bindParam(":id", $id);
        $query->bindParam(":name", $name);
        $query->bindParam(":email", $email);
        $query->bindParam(":password", $password);
        $query->bindParam(":avatar", $avatar);
    
        return $query->execute();
    }

    public function findAll() {
        $query = $this->db->query("SELECT * FROM users WHERE is_deleted = 0");
        $query->execute();
    
        return $query->fetchAll();
    }

    public function findByEmail(string $email) {
        $query = $this->db->query("SELECT * FROM users WHERE email = :email AND is_deleted = 0");
        $query->bindParam(":email", $email);
        $query->execute();
    
        return $query->fetch();
    }

    public function deleteById(string $id) {
        $query = $this->db->query("UPDATE users SET is_deleted = 1 WHERE id = :id AND is_deleted = 0");
        $query->bindParam(":id", $id);
    
        return $query->execute();
    }

    public function count() {
        $query = $this->db->query("SELECT COUNT(*) as total FROM users WHERE is_deleted = 0");
        $query->execute();
    
        return $query->fetch();
    }
}