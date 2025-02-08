<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../models/conexion/conexion.php';
require_once '../../../models/validaciones/validaciones.php';
require_once '../../../models/comprobaciones/comprobaciones.php';
require_once '../../../models/usuario/familiares/familiares.php';
$familiar=new Familiar();
$validar=new Validaciones();
$comprobar=new Comprobaciones();
$amigo = $validar->validacionAlfanumerico($_POST['nick_familiar']);
$nick_existe = $comprobar->comprobarNickExiste($amigo);
$familia_existe = $familiar->comprobarFamiliaExiste($_SESSION['usuario']['nick'], $amigo);

if ($nick_existe && !$familia_existe) {
    $familiar->insertarFamiliar($_SESSION['usuario']['nick'], $amigo);
    
    header('Location:../../../index.php?familiar=Familiar agregado');
} else {
    if ($familia_existe) {
        $_SESSION['error_familia'] = "Ya tienes una vinculación con este usuario. Comprueba tus solicitudes pendientes";
        header('Location:../../../index.php?familiar=Error al agregar familiar');
    } else {
        $_SESSION['error_nick'] = "El nick introducido no existe";
        header('Location:../../../index.php?familiar=Error al agregar familiar');
    }
}