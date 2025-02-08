
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../models/conexion/conexion.php';
require_once '../../../models/usuario/familiares/familiares.php';
$familiarC=new Familiar();
$familiar=$_GET['familiar'];
var_dump($familiar);
$familiarC->borrarFamiliar($_SESSION['usuario']['nick'],$familiar);
$familiarC->borrarFamiliarSim($_SESSION['usuario']['nick'],$familiar);
header('Location:../../../index.php?familiar=Familiar borrado');
