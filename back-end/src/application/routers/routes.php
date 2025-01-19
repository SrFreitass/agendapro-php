<?php

require_once __DIR__ . "/../controllers/CreateUserController.php";
require_once __DIR__ . "/../controllers/SignInController.php";
require_once __DIR__ . "/../controllers/CreatePlaceController.php";
require_once __DIR__ . "/../controllers/GetPlacesController.php";
require_once __DIR__ . "/../controllers/CreateReservationController.php";
require_once __DIR__ . "/../controllers/DeleteReservationController.php";

use Src\Application\Controllers\CreatePlaceController;
use Src\Application\Controllers\CreateReservationController;
use Src\Application\Controllers\CreateUserController;
use Src\Application\Controllers\GetPlacesController;
use Src\Application\Controllers\SignInController;

$routes = [
    "/api/v1/signup" => [
        "controller" => function() {
           $controller = new CreateUserController();
           $controller->execute();
        },
        "method" => "POST"
    ],
    "/api/v1/signin" => [
        "controller" => function() {
           $controller = new SignInController();
           $controller->execute();
        },
        "method" => "POST"
    ],

    "/api/v1/create/place" => [
        "controller" => function() {
           $controller = new CreatePlaceController();
           $controller->execute();
        },
        "method" => "POST"
    ],

    "/api/v1/places" => [
        "controller" => function() {
            $controller = new GetPlacesController();
            $controller->execute();
        },
        "method" => "GET"
    ],

    "/api/v1/reservation" => [
        "controller" => function() {
            $controller = new CreateReservationController();
            $controller->execute();
        },
        "method" => "POST"
    ],

    "/api/v1/delete/reservation" => [
        "controller" => function() {
            $controller = new DeleteReservationController();
            $controller->execute();
        },
        "method" => "DELETE"
    ]
];


$path = explode("?", 
explode("routes.php", $_SERVER["REQUEST_URI"])[1]
)[0];

$method = $_SERVER["REQUEST_METHOD"];

if(isset($routes[$path]) && $routes[$path]["method"] === $method) {
    $routes[$path]["controller"]();
} 
