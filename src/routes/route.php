<?php

require_once __DIR__ . "/../controllers/auth/createAccountController.php";

$routes = [
    "signup" => [
        "method" => "POST",
        "controller" => function () {
            $controller = new CreateAccountController();
            $controller->handle();
        },
    ]
];


if(!isset($_GET["controller"])) {
    http_response_code(404);
    die();
}


$route = $routes[$_GET["controller"]];
if($route["method"] === $_SERVER["REQUEST_METHOD"]) {
    $route["controller"]();
}
