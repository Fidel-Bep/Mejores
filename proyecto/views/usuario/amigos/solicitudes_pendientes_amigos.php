<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../models/conexion/conexion.php';
require_once '../../../models/usuario/amigos/amigos.php';
$amigo=new Amigos();
$solicitudes = $amigo->verSolicitudesAmistadPendientes($_SESSION['usuario']['nick']);
?>

<style>
     .container{
        background-color: rgba(214, 130, 23, 0.7);
        width: 600px;
        margin: 0px auto;
        margin-top: 40px;
        text-align: center;
        z-index: -100;
        height: auto;
        overflow: scroll;
        
    }

    #titulo_solicitudes{
        margin-top:5px;
        margin-bottom:15px;
        font-size: 30px;
        font-weight:bold;
    }

    h3{
        color:beige;

    }
    a{
        text-decoration:none;
    }

    

    
</style>
    <div class="container">
        
           

            <h2 class="indie-flower-regular" id="titulo_solicitudes">Solicitudes Pendientes</h2>
                <?php if(mysqli_num_rows($solicitudes)==0):;?>               
                    <p style="margin-bottom:10px;">No tienes solicitudes pendientes</p>     
                <?php else:;?>
                    <?php while ($solicitud = mysqli_fetch_assoc($solicitudes)):; ?>
                        <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                            <h3><?= $solicitud['nick_usuario']; ?></h3>
                            <a href="controllers/usuario/amigos/solicitudes_pendientes_amigos.php?amistad=aceptada">Aceptar</a>
                            <a href="controllers/usuario/amigos/socicitudes_pendientes_amigos.php?amistad=rechazada">Rechazar</a>
                        </div>
                    <?php endwhile; ?>
        
                <?php endif; ?>




       
    </div>

