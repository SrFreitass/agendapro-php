<?php


namespace Src\Application\Controllers;
use Src\Core\Domains\Usecases\CreateSubscribeUseCase;

require_once "../../core/domains/usecases/CreateSubscribeUseCase.php";

class CreateSubscribeController {
    function execute() {
       $body = [
        "name" => $_POST["name"],
        "authorizations" => $_POST["authorizations"]
       ];

       $useCase = new CreateSubscribeUseCase();

       $output = $useCase->execute($body);
       
       echo $output;
    }
}