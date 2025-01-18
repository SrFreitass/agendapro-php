<?php


namespace Src\Application\Controllers;

require_once __DIR__ . "/../../core/domains/usecases/CreateUserUseCase.php";
require_once __DIR__ . "/../../infra/repositories/UserRepository.php";

use Src\Core\Domains\Usecases\CreateUserUseCase;
use Src\Infra\Repositories\UserRepositoryImpl;

class CreateUserController {
    function execute() {
        $body = json_decode(file_get_contents('php://input'), true);
        
        $useCase = new CreateUserUseCase(
            new UserRepositoryImpl()
        );

        $output = $useCase->execute($body);
        
        echo $output;
    }
}