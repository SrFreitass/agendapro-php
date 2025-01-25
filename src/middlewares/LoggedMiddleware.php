<?php

function loggedMiddleware() {
    session_start();

    if(!isset($_SESSION["user_id"])) {
        return header("Location: ../auth/signin");
    }
}