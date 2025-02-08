<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(file_exists('../../models/publicaciones/publicaciones.php')) {
    require_once '../../models/publicaciones/publicaciones.php';
    require_once '../../models/usuario/metas/metas.php';
    require_once '../../models/conexion/conexion.php';
}else{
    require_once 'models/publicaciones/publicaciones.php';
    require_once 'models/usuario/metas/metas.php';
    require_once 'models/conexion/conexion.php';
}
$meta=new Metas();
$pub=new Publicacion();
?>

<style>
     #container_publicaciones{
        background-color: rgba(214, 130, 23, 0.7);
        width: 600px;
        margin: 0px auto;
        margin-top: 40px;
        text-align: center;
        z-index: -100;
        height: auto;
        overflow: scroll;
     }

     #titulo_publicaciones{
        font-size:30px;
        font-weight: bold;
        margin-top:10px;
     }

     .friend{
            background-color:rgba(183, 120, 38, 0.88);
            
     }

     
     .pub_completa{
        text-decoration:none;
        
     }
</style>

    <div id="container_publicaciones">

        
        <?php $result=$pub->verPublicaciones();?>
        
        <?php if (mysqli_num_rows($result)==0): ;?>
            <h2 class="indie-flower-regular">Aún no tienes ninguna publicación</h2>
        
        <?php else: ;?>
        
        <h2 class="indie-flower-regular" id="titulo_publicaciones">Publicaciones</h2>
        
        <?php while ($publicacion = mysqli_fetch_assoc($result)): ;?>
        <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
        <h2><?=$publicacion['titulo'];?></h2>
        <?php if($publicacion['nick_usuario']!= ''):?>
        <p><?="Usuario: ".$publicacion['nick_usuario'];?></p>
        <?php else:?>
        <p><?="Testigo: ".$publicacion['nick_testigo'];?></p>
        <?php endif;?>
        <?php if($publicacion['comentario_usuario']!= ''):?>
            <p><?="Comentario usuario: <br>".$publicacion['comentario_usuario'];?></p>
        <?php endif;?>
        <?php if($publicacion['comentario_testigo']!= ''):?>
            <p><?="Comentario testigo: <br>".$publicacion['comentario_testigo'];?></p>
        <?php endif;?>   
        <?php if($publicacion['id_meta']!= ''):?>
            <p><?="Meta: <br>".$meta->verMetasNombre($publicacion['id_meta']);?></p>
        <?php endif;?>  
       
        
        <p><?="Puntuacion ".$publicacion['puntuacion'];?></p>
        <p><?=$publicacion['fecha_creacion'];?></p>
        <p><a class="pub_completa" href="views/publicaciones/publicacion_completa.php?id=<?=$publicacion['id']?>">Publicación completa</a></p>
        
        </div>
        <?php endwhile;?>
        <?php endif;?>
           
        <?php if(isset($_GET['publicacion'])):?>
            <?php unset($_GET['publicacion'])?>
            <?php endif;?>


    
    </div>

</body>

</html>