<?php

function notLoggedMiddleware() {
    session_start();

    if(isset($_SESSION["user_id"])) {
        return header("Location: ../views/home");
    }
}