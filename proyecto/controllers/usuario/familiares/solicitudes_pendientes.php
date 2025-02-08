<?php

require_once '../../../models/conexion/conexion.php';

require_once '../../../models/usuario/familiares/familiares.php';
$familiar=new Familiar();
if($_GET['familia']=='aceptada'){
    $resolucion='aceptada';
    $familiar->resolverSolicitudFamilia($_SESSION['usuario']['nick'],$resolucion);
    header('Location:../../../index.php?familiar=Nuevo familiar aceptado');
}else{
    $resolucion='rechazada';
    header('Location:../../../index.php?familiar=Familiar rechazado');
}
?>