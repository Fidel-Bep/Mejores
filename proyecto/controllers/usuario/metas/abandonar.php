<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../models/conexion/conexion.php';
require_once '../../../models/usuario/metas/metas.php';
$metaC=new Metas();

$meta=$_GET['meta'];
var_dump($meta);
$metaC->borrarMetaUsuario($_SESSION['usuario']['nick'],$meta);
header('Location:../../../index.php?meta=Meta borrada');