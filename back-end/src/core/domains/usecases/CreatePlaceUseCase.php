<?php

use Src\Application\Utils\Response;
use Src\Core\Domains\Entities\PlaceEntity;
use Src\Core\Repositories\PlaceRepository;

class CreatePlaceUseCase {
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

        session_start();

        $placeEntity = new PlaceEntity(
            $body["name"],
            $body["description"],
            $body["capacity"],
            $body["image_url"],
            $_SESSION["id"]
        );

        $res = $this->placeRepository->createPlace(
            $placeEntity
        );

        if(!$res) {
            Response::json(
                [
                    "success" => false,
                    "message" => "Ocorreu um erro ao cirar o local!"
                ],
                201
            );
        } 

        return Response::json(
            [
                "success" => true,
                "message" => "Local criado com sucesso!"
            ],
            500
        );
    }
}