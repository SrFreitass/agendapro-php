<?php

require_once __DIR__ . "/../controllers/auth/createAccountController.php";
require_once __DIR__ . "/../controllers/auth/SignInController.php";
require_once __DIR__ . "/../controllers/CreatePlaceController.php";
require_once __DIR__ . "/../controllers/CreateReservationController.php";
require_once __DIR__ . "/../controllers/GetHousesWithFilterController.php";
require_once __DIR__ . "/../controllers/DeleteReservationController.php";
require_once __DIR__ . "/../controllers/DeleteHouseController.php";
require_once __DIR__ . "/../controllers/DeleteUserController.php";
require_once __DIR__ . "/../controllers/UpdateHouseController.php";

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

    "delete_reservation_by_id" => [
        "method" => "GET",
        "controller" => function () {
            $controller = new DeleteReservationController();
            $controller->handle();
        },
    ],

    "delete_house_by_id" => [
        "method" => "GET",
        "controller" => function () {
            $controller = new DeleteHouseController();
            $controller->handle();
        },
    ],

    "update_house_by_id" => [
        "method" => "POST",
        "controller" => function () {
            $controller = new UpdateHouseController();
            $controller->handle();
        },
    ],

    "delete_user_by_id" => [
        "method" => "GET",
        "controller" => function () {
            $controller = new DeleteUserController();
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
