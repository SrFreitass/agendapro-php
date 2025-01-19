<?php

namespace Src\Infra\Repositories;

require_once __DIR__ . "/../../core/repositories/ReservationRepository.php";

use Src\Core\Domains\Entities\ReservationEntity;
use Src\Core\Repositories\ReservationRepository;
use Src\Infra\Database\Database;        

class ReservationRepositoryImpl implements ReservationRepository {  
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function get(string $id) {
        $q = $this->database->query("SELECT * FROM reservations WHERE id = :id AND active = 1");

        $q->bindParam(":id", $id);

        $q->execute();

        $reservation = $q->fetchAll();

        return $reservation;
    }

    public function create(ReservationEntity $reservation): bool {
        $q = $this->database->query("INSERT INTO reservations (id, user_id, place_id, datetime, active) VALUES (:id, :user_id, :place_id, :datetime, :active)");

        $q->bindParam(":id", $reservation->id);
        $q->bindParam(":user_id", $reservation->user_id);
        $q->bindParam(":place_id", $reservation->place_id);
        $q->bindParam(":datetime", $reservation->datetime);
        $q->bindParam(":active", $reservation->active);

        return $q->execute();
    }

    public function delete(string $id): bool {
        $q = $this->database->query("UPDATE reservations SET active = 0 WHERE id = :id");

        $q->bindParam(":id", $id);

        return $q->execute();
    }

}