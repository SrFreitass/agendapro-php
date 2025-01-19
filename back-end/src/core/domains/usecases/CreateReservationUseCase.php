<?php

namespace Src\Core\Domains\Usecases;

use DateTime;
use Src\Application\Utils\Response;
use Src\Core\Domains\Entities\ReservationEntity;
use Src\Core\Repositories\PlaceRepository;
use Src\Core\Repositories\ReservationRepository;

require_once __DIR__ . "/../entities/ReservationEntity.php";
require_once __DIR__ . "/../../../application/utils/Response.php";

class CreateReservationUseCase {

    public function __construct(private ReservationRepository $reservationRepository, private PlaceRepository $placeRepository) {}

    public function execute($body) {             
        if(
            !isset($body["place_id"]) ||
            !isset($body["datetime"]) 
        ) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Corpo inválido!"
                ],
                422
            );
        }

        $datetime_int = strtotime($body["datetime"]);

        if($datetime_int < time() || !$body["datetime"]) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Data inválida!"
                ],
                422
            );
        }

        $place = $this->placeRepository->getPlace($body["place_id"]);

        if(!$place) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Local não encontrado!"
                ],
                404
            );
        }

        $place = $this->placeRepository->getPlaceWithReservations($body["place_id"]);

        if($place) {
            foreach($place as $reservation) {
                if(strtotime($reservation["datetime"]) == $datetime_int) {
                    return Response::json(
                        [
                            "success" => false,
                            "message" => "Reserva já existente nesse horário!"
                        ],
                        409
                    );
                }
            }
        }


        session_start();

        $reservationEntity = new ReservationEntity(
            id: uniqid(),
            user_id: $_SESSION["id"],
            place_id: $body["place_id"],
            datetime: $body["datetime"],
        );

        $this->reservationRepository->create($reservationEntity);
    
        return Response::json(
            [
                "success" => true,
                "message" => "Reserva criada!"
            ],
            201
        );
    }
}