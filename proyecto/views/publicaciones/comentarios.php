<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(file_exists('../../models/publicaciones/publicaciones.php')) {
    require_once '../../models/publicaciones/publicaciones.php';
    require_once '../../models/conexion/conexion.php';
    require_once '../../models/comentarios/comentarios.php';
}else{
    require_once 'models/publicaciones/publicaciones.php';
    require_once 'models/conexion/conexion.php';
    require_once 'models/comentarios/comentarios.php';
}

$comment=new Comentario();
$id=$_GET['id'];
?>

<style>
     @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');

     .indie-flower-regular {
            font-family: "Indie Flower", serif;
            font-weight: 400;
            font-style: normal;
        }
        
    body{
        background-image:url(../../assets/img/hojas_fondo.jpg);
    }
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

     #titulo_amigos{
        font-size:30px;
        font-weight: bold;
        margin-top:10px;
     }

     .friend{
            background-color:rgba(183, 120, 38, 0.88);
            
     }

     #abandonar_amistad_a,
     #abandonar_amistad_b{
        text-decoration:none;
        
     }

     #volver_publicacion{
        margin-top:10px;
        text-decoration:none;
        border:1px solid black;
        background-color:rgba(183, 120, 38, 0.88);
        color:white;
     }

     .h2_comp{
        font-weight:bold;
        font-size:30px;
     }

     img{
        width:300px;
        height:300px;
     }
</style>


    <div class="container" id="container_comentarios">
        

        
            <?php $result=$comment->verComentarios($id)?>
            <?php if(mysqli_num_rows($result)==0):?>
                <h2>No hay comentarios para esta publicación</h2>
                <?php else:;?>
                <?php while($comentario =mysqli_fetch_assoc($result)):?>
                    <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                <p><?="Nick del usuario:".$comentario['nick_comentador']?></p>
                <p><?="Comentario: ".$comentario['comentario']?></p>
                <p><?="Duda: ".$comentario['duda']?></p>
                <p><?="Testigo: ".$comentario['testigo']?></p>
                </div>
                <?php endwhile;?>
                <?php endif;?>
                


        
        


   
    </div>
