<?php

namespace Src\Core\Domains\Usecases;

use Src\Application\Utils\Response;

require_once __DIR__ . "/../../../application/utils/Response.php";

class CreateSubscribeUseCase {
    function execute(array $body) {
        
        
        return Response::json(
            ["hello" => "world"],
            200
        );
    }
}