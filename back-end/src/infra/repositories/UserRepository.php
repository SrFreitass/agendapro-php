<?php

require_once __DIR__ . "/../../core/repositories/UserRepository.php";
require_once __DIR__ . "/../database/db.php";
require_once __DIR__ . "/../../core/domains/entities/UserEntity.php";

use Src\Core\Repositories\UserRepository;
use Src\Core\Domains\Entities\UserEntity;
use Src\Infra\Database\Database;


class UserRepositoryImpl implements UserRepository {
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function create(UserEntity $user): bool {
        $q = $this->database->query("INSERT INTO users VALUES (:id, :name, :email, :password, :role_id, :created_at, :updated_at, DEFAULT, :phone_number)");
         $q->bindParam(":id", $user->id);
         $q->bindParam(":name", $user->name);
         $q->bindParam(":email", $user->email);
         $q->bindParam(":password", $user->password);
         $q->bindParam(":phone_number", $user->phone_number);
         $q->bindParam(":role_id", $user->role_id);
         $q->bindParam(":created_at", $user->created_at);
         $q->bindParam(":updated_at", $user->updated_at);

         return $q->execute();
    }
    

    public function get(string $id = '', string $email = '') {
        $q = $this->database->query('SELECT * FROM users WHERE id = :id OR email = :email');
        $q->bindParam(':id', $id);
        $q->bindParam(':email', $email);

        $q->execute();

        $user = $q->fetchAll(PDO::FETCH_ASSOC);

        return $user;
    }
}
