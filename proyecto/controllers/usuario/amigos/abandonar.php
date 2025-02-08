
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../models/conexion/conexion.php';
require_once '../../../models/usuario/amigos/amigos.php';

$amigoC= new Amigos();

$amigo=$_GET['amistad'];

class AmigosController{

}
$amigoC->borrarAmigo($_SESSION['usuario']['nick'],$amigo);
$amigoC->borrarAmigoSim($_SESSION['usuario']['nick'],$amigo);


header('Location:../../../index.php?amistad=amistad borrada');
