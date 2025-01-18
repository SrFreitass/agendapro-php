<?php

namespace Src\Core\Domains\Usecases;

use RegexIterator;
use Src\Application\Utils\Response;
use Src\Core\Domains\Entities\UserEntity;
use Src\Core\Repositories\SubscribesRepository;
use Src\Core\Repositories\UserRepository;

require_once __DIR__ . "/../../../application/utils/Response.php";

class SignInUseCase {

    public function __construct(private UserRepository $userRepository) {}

    public function execute($body) {     

        if(
            !isset($body["email"]) ||
            !isset($body["password"]) 
        ) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Corpo inválido!"
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

         $user = $this->userRepository->get(email: $body["email"]);

         if(!$user) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Email ou senha inválidos!"
                ],
                400
            );
         }

        if(!password_verify($body["password"], $user[0]["password"])) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Email ou senha inválidos!"
                ],
                400
            );
        }    

        $session = session_start();

        if($session) $_SESSION["id"] = $user[0]["id"];

        return Response::json(
            [
                "success" => true,
                "message" => "Usuário logado!",
            ],
            200
        );
    }
}