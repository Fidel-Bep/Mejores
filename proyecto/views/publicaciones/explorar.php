<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(file_exists('../../models/publicaciones/publicaciones.php')) {
    require_once '../../models/publicaciones/publicaciones.php';
    require_once '../../models/conexion/conexion.php';
}else{
    require_once 'models/publicaciones/publicaciones.php';
    require_once 'models/conexion/conexion.php';
}

$pub=new Publicacion();
?>

    <div id="container_publicaciones">

        
        <?php $result=$pub->verMisPublicaciones($_SESSION['usuario']['nick']);?>
        
        <?php if (mysqli_num_rows($result)==0): ;?>
            <h2 class="indie-flower-regular">Aún no tienes ninguna publicación</h2>
        
        <?php else: ;?>
        
        <h2>Publicaciones</h2>
        
        <?php while ($publicacion = mysqli_fetch_assoc($result)): ;?>
        <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
        <h2><?=$publicacion['titulo'];?></h2>
        <p><?="Usuario: ".$publicacion['nick_usuario'];?></p>
        <p><?="Testigo: ".$publicacion['nick_testigo'];?></p>
        <p><?="Comentario usuario: <br>".$publicacion['comentario_usuario'];?></p>
        <p><?="Comentario testigo: <br>".$publicacion['comentario_testigo'];?></p>
        <p><?=$publicacion['fecha_creacion'];?></p>
        <p><a href="views/publicaciones/publicacion_completa.php?id=<?=$publicacion['id']?>">Publicación completa</a></p>
        
        </div>
        <?php endwhile;?>
        <?php endif;?>
           
        <?php if(isset($_GET['publicacion'])):?>
            <?php unset($_GET['publicacion'])?>
            <?php endif;?>


    
    </div>

</body>

</html>