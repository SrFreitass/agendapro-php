<?php

namespace Src\Application\Utils;

class Response {
    static public function json(array $body, int $status) {
        header('Content-Type: application/json', true, $status);
        return json_encode($body);
    }
}