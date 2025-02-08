<?php require_once "../../models/conexion/conexion.php";

if(session_status() != PHP_SESSION_NONE){
    session_destroy();
};

header('Location: ../../index.php');