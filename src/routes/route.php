<?php

require_once __DIR__ . "/../controllers/auth/createAccountController.php";
require_once __DIR__ . "/../controllers/auth/SignInController.php";
require_once __DIR__ . "/../controllers/CreatePlaceController.php";
require_once __DIR__ . "/../controllers/CreateReservationController.php";
require_once __DIR__ . "/../controllers/GetHousesWithFilterController.php";

$routes = [
    "signup" => [
        "method" => "POST",
        "controller" => function () {
            $controller = new CreateAccountController();
            $controller->handle();
        },
    ],
    "signin" => [
        "method" => "POST",
        "controller" => function () {
            $controller = new SignInController();
            $controller->handle();
        },
    ],
    "create_place" => [
        "method" => "POST",
        "controller" => function () {
            $controller = new CreatePlaceController();
            $controller->handle();
        },
    ],
    "create_reservation" => [
        "method" => "POST",
        "controller" => function () {
            $controller = new CreateReservationController();
            $controller->handle();
        },
    ],

    "get_houses_with_filter" => [
        "method" => "GET",
        "controller" => function () {
            $controller = new GetHousesWithFilterController();
            $controller->handle();
        },
    ],
];


if(!isset($_GET["controller"])) {
    http_response_code(404);
    die();
}


$route = $routes[$_GET["controller"]];
if($route["method"] === $_SERVER["REQUEST_METHOD"]) {
    $route["controller"]();
}
