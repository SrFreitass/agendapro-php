<?php

require_once "../controllers/createSubscribeController.php";
use Src\Application\Controllers\CreateSubscribeController;

$routes = [
    "/subscribe" => [
        "controller" => function() {
           $controller = new CreateSubscribeController();
           $controller->execute();
        },
        "method" => "POST"
    ]
];


$path = explode("routes.php", $_SERVER["REQUEST_URI"])[1];
$method = $_SERVER["REQUEST_METHOD"];

if(isset($routes[$path]) && $routes[$path]["method"] === $method) {
    $routes[$path]["controller"]();
} 
