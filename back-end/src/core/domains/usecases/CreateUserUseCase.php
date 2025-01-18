<?php

namespace Src\Core\Domains\Usecases;

use RegexIterator;
use Src\Application\Utils\Response;
use Src\Core\Domains\Entities\UserEntity;
use Src\Core\Repositories\SubscribesRepository;
use Src\Core\Repositories\UserRepository;

require_once __DIR__ . "/../../../application/utils/Response.php";

class CreateUserUseCase {

    public function __construct(private UserRepository $userRepository) {}

    public function execute($body) {     

        if(
            !isset($body["name"]) ||
            !isset($body["email"]) ||
            !isset($body["password"]) ||
            !isset($body["phone_number"])
        ) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Corpo inválido!"
                ],
                422
            );
        }
        
        if(strlen($body["name"]) < 3) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Nome requer no mínimo 3 digitos"
                ],
                422
            );
        }

        if(!filter_var($body["email"], FILTER_VALIDATE_EMAIL)) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "E-mail inválido!"
                ],
                422
            );
         }

         if(preg_match("/^[A-Z]+$/", $body["phone_number"]) || strlen($body["phone_number"]) < 11) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Telefone inválido"
                ],
                422
            );
         }

         $user = $this->userRepository->get(email: $body["email"]);

         if($user) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "E-mail já existente!"
                ],
                400
            );
         }

        $body["password"] = password_hash($body["password"], PASSWORD_BCRYPT);

        $userEntity = new UserEntity(
            $body["name"],
            $body["email"],
            $body["password"], 
            $body["phone_number"], 
        );

        $result = $this->userRepository->create(
            $userEntity
        );

        if(!$result) return Response::json(
            [
                "success" => false,
                "message" => "Unexpected Error"
            ],  
            status: 500 
        );

        $session = session_start();

        if($session) $_SESSION["id"] = $userEntity->id;

        return Response::json(
            [
                "success" => true,
                "message" => "User created"
            ],
            201
        );
    }
}