<?php

namespace Src\Core\Domains\Usecases;

use Src\Application\Utils\Response;
use Src\Core\Domains\Entities\PlaceEntity;
use Src\Core\Repositories\PlaceRepository;

require_once __DIR__ . "/../../../application/utils/Response.php";
require_once __DIR__ . "/../../repositories/PlaceRepository.php";
require_once __DIR__ . "/../../entities/PlaceEntity.php";

class UpdatePlaceUseCase {
    public function __construct(private PlaceRepository $placeRepository) {}

    public function execute($body) {
        if(
            !isset($body["name"]) ||
            !isset($body["description"]) ||
            !isset($body["capacity"]) ||
            !isset($body["image_url"])
        ) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Corpo inválido!"
                ],
                400
            );
        }

        if(strlen($body["name"]) < 3) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Nome requer no mínimo 3 digitos"
                ],
                400
            );
        }

        if(strlen($body["description"]) < 3) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Descrição requer no mínimo 3 digitos"
                ],
                400
            );
        }

        if(!filter_var($body["image_url"], FILTER_VALIDATE_URL)) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "URL inválida"
                ],
                400
            );
        }

        if(!is_numeric($body["capacity"])) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Capacidade deve ser um número"
                ],
                400
            );
        }

        $place = $this->placeRepository->getPlace($body["id"]);

        if(!$place) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Local não encontrado"
                ],
                404
            );
        }


        $placeEntity = new PlaceEntity(
            $body["name"],
            $body["description"],
            $body["capacity"],
            $body["image_url"],
            $place["created_by"],
            $place["created_at"],
        );

        $res = $this->placeRepository->updatePlace($body["id"], $placeEntity);

        if(!$res) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Ocorreu um erro inesperado"
                ],
                500
            );
        }

        return Response::json(
            [
                "success" => true,
                "message" => "Local atualizado com sucesso"
            ],
            200
        );
    }
}