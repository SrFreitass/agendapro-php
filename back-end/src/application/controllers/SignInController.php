<?php


namespace Src\Application\Controllers;

require_once __DIR__ . "/../../core/domains/usecases/SignInUseCase.php";
require_once __DIR__ . "/../../infra/repositories/UserRepository.php";

use Src\Core\Domains\Usecases\SignInUseCase;
use Src\Infra\Repositories\UserRepositoryImpl;

class SignInController {
    function execute() {
        $body = json_decode(file_get_contents('php://input'), true);
        
        $useCase = new SignInUseCase(
            new UserRepositoryImpl()
        );

        $output = $useCase->execute(body: $body);
        
        echo $output;
    }
}