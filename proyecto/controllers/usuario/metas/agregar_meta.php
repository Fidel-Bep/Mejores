<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../models/conexion/conexion.php';
require_once '../../../models/validaciones/validaciones.php';
require_once '../../../models/comprobaciones/comprobaciones.php';
require_once '../../../models/usuario/metas/metas.php';
$metaC=new Metas();
$validar=new Validaciones();
$comprobar=new Comprobaciones();


$descripcion=$validar->validacionAlfanumerico($_POST['descripcion'] ?? '');

$meta=$validar->validacionAlfanumerico($_POST['meta'] ?? $_GET['meta']);


    $existencia=$comprobar->comprobarMetaExiste($meta);






if($existencia){
    $metaC->insertarMetaUsuario($_SESSION['usuario']['nick'],$meta);
    $_SESSION['exito']='Meta agregada con éxito';
    if($_GET['meta']!=''){
        header('Location:../../../index.php?meta=Meta agregada');
    }
    header('Location:../../../index.php?meta=Meta agregada');
}else{
    $metaC->insertarMeta($meta,$descripcion);
    $metaC->insertarMetaUsuario($_SESSION['usuario']['nick'],$meta);
    $_SESSION['exito']='Meta agregada con éxito';
    header('Location:../../../index.php?meta=Meta agregada');
};