<?php

namespace Src\Infra\Repositories;

require_once __DIR__ . "/../database/db.php";
require_once __DIR__ . "/../../core/repositories/PlaceRepository.php";
require_once __DIR__ . "/../../core/domains/entities/PlaceEntity.php";

use PDO;    
use Src\Core\Repositories\PlaceRepository;
use Src\Core\Domains\Entities\PlaceEntity;
use Src\Infra\Database\Database;

class PlaceRepositoryImpl implements PlaceRepository {
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function createPlace(PlaceEntity $place) {
        $q = $this->database->query(
            "INSERT INTO places(id, name, description, capacity, image_url, created_by, created_at, updated_at) 
            VALUE (:id, :name, :description, :capacity, :image_url, :created_by, :created_at, :updated_at)"
        );

        $q->bindParam(":id", $place->id);
        $q->bindParam(":name", $place->name);
        $q->bindParam(":description", $place->description);
        $q->bindParam(":capacity", $place->capacity);
        $q->bindParam(":image_url", $place->image_url);
        $q->bindParam(":created_by", $place->created_by);
        $q->bindParam(":created_at", $place->created_at);
        $q->bindParam(":updated_at", $place->updated_at);

        return $q->execute();
    }

    public function getPlaces() {
        $q = $this->database->query("SELECT * FROM places");

        $q->execute();

        $places = $q->fetchAll(PDO::FETCH_ASSOC);

        return $places;
    }

    public function getPlace(string $id) {
        $q = $this->database->query("SELECT * FROM places WHERE id = :id AND active = 1");

        $q->bindParam(":id", $id);

        $q->execute();

        $place = $q->fetchAll(PDO::FETCH_ASSOC);

        return $place;
    }

    public function getPlaceWithReservations(string $id) {
        $q = $this->database->query(
            "SELECT * FROM places INNER JOIN reservations ON places.id = reservations.place_id WHERE places.id = :id AND places.active = 1 AND reservations.active = 1"
        );  

        $q->bindParam(":id", $id);

        $q->execute();

        $place = $q->fetchAll(PDO::FETCH_ASSOC);

        return $place;
    }

    public function updatePlace(string $id, PlaceEntity $place) {
        $q = $this->database->query(
            "UPDATE places SET name = :name, description = :description, capacity = :capacity, image_url = :image_url, updated_at = :updated_at WHERE id = :id"
        );

        $q->bindParam(":id", $id);
        $q->bindParam(":name", $place->name);
        $q->bindParam(":description", $place->description);
        $q->bindParam(":capacity", $place->capacity);
        $q->bindParam(":image_url", $place->image_url);
        $q->bindParam(":updated_at", $place->updated_at);

        return $q->execute();
    }

    public function deletePlace(string $id) {
        $q = $this->database->query("UPDATE places SET active = 0 WHERE id = :id");

        $q->bindParam(":id", $id);

        return $q->execute();
    }
}