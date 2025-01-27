<?php

require_once __DIR__ . "/../infra/models/userModel.php";

function AdminMiddleware() {
    error_reporting(E_ALL ^ E_NOTICE);  
    session_start();

    $userModel = new userModel();

    if(!isset($_SESSION["user_id"])) {
        return header("Location: ../views/auth/signin.php");
    }

    $user = $userModel->findById($_SESSION["user_id"]);


    if(!$user) {
        return header("Location: ../views/auth/signin.php");
    }

    if($user["role"] !== "admin") {
        return header("Location: ../../views/home");
    }
}   

