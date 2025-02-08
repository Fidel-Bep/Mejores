<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../models/conexion/conexion.php';
require_once '../../../models/validaciones/validaciones.php';
require_once '../../../models/comprobaciones/comprobaciones.php';
require_once '../../../models/usuario/amigos/amigos.php';

$validar=new Validaciones();
$comprobar=new Comprobaciones();
$amigoC=new Amigos();
$amigo = $validar->validacionAlfanumerico($_POST['nick_amigo']);
$nick_existe = $comprobar->comprobarNickExiste($amigo);
$amistad_existe = $amigoC->comprobarAmistadExiste($_SESSION['usuario']['nick'], $amigo);

if ($nick_existe && !$amistad_existe) {
    $amigoC->insertarAmigo($_SESSION['usuario']['nick'], $amigo);
    header('Location:../../../index.php?amistad=Amistad agregada');
} else {
    if ($amistad_existe) {
        $_SESSION['error_amistad'] = "Ya tienes una vinculación con este usuario. Comprueba tus solicitudes pendientes";
        header('Location:../../../index.php?amistad=error al agregar amistad');
    } else {
        $_SESSION['error_nick'] = "El nick introducido no existe";
        header('Location:../../../index.php?amistad=error al agregar amistad');
    }
}