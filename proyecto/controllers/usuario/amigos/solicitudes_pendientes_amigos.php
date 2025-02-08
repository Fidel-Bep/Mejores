<?php

require_once '../../../models/conexion/conexion.php';

require_once '../../../models/usuario/amigos/amigos.php';

$amigo=new Amigos();

if($_GET['amistad']=='aceptada'){
    $resolucion='aceptada';
    $amigo->resolverSolicitudAmistad($_SESSION['usuario']['nick'],$resolucion);
    header('Location:../../../index.php?amistad=Amistad aceptada');
}else{
    $resolucion='rechazada';
    header('Location:../../../index.php?amistad=Amistad rechazada');
}
?>