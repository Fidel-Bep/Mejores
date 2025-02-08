<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(file_exists('../../models/publicaciones/publicaciones.php')) {
    require_once '../../models/publicaciones/publicaciones.php';
    require_once '../../models/validaciones/validaciones.php';
    require_once '../../models/comprobaciones/comprobaciones.php';
    require_once '../../models/usuario/metas/metas.php';
    require_once '../../models/conexion/conexion.php';
    require_once '../../models/filtros/filtros.php';
}else{
    require_once 'models/validaciones/validaciones.php';
    require_once 'models/comprobaciones/comprobaciones.php';
    require_once 'models/filtros/filtros.php';
   
    require_once 'models/publicaciones/publicaciones.php';
    require_once 'models/usuario/metas/metas.php';
    require_once 'models/conexion/conexion.php';
}

$val=new Validaciones();
$comp=new Comprobaciones();
$meta=new Metas();

$nick_us=$val->validacionAlfanumerico($_POST['nick_usuario'] ?? '');
$nick_tes=$val->validacionAlfanumerico($_POST['nick_testigo']?? '');
$tit=$val->validacionAlfanumerico($_POST['titulo'] ?? '');
$dif=$_POST['dificultad'] ?? '';
$dud=$_POST['duda'] ?? '';
$offset=$_GET['page'] ?? 0;
$offset=$offset!=0 ? ($offset -1)*10 : 0;



$result = filtrarPublicaciones($nick_us,$nick_tes,$tit,$dif,$dud,$offset); 








?>
<main>
<style>
     @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');

.indie-flower-regular {
    font-family: "Indie Flower", serif;
    font-weight: 400;
    font-style: normal;
}

body {
    background-image: url(../../assets/img/hojas_fondo.jpg);
}
     .container_publicaciones{
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

     .paginas{
        
        margin-top:0px;
     }

     .paginas a{
        text-decoration:none;
        color:black;

     }

     #volver_publicaciones{
        text-decoration:none;
        background-color: rgba(214, 130, 23, 0.7);
        color:blue;
     }
</style>

    <div class="container_publicaciones">
        <a href="../../index.php?publicacion=ok" id="volver_publicacion">Volver</a>
        <div class='friend' style="border: 1px solid black; padding: 10px; margin: 10px;">
            <h2 class="indie-flower-regular" id="titulo_publicaciones">Filtrar publicación</h2>
            <form action="explorar_publicaciones_p.php" method="POST">
                <label for="nick_usuario">Nick del usuario:</label>

                <?php $nick_usuarios=todosNombreUsuarioPublicaciones();?>
                <input list="nick_usuario" id="nick_usuario_input" name="nick_usuario">
                <datalist id="nick_usuario">
                <?php while($usuario=mysqli_fetch_assoc($nick_usuarios)):?>
                   
                    
                    <option value='<?=$usuario['nick_usuario'];?>'>
                        <?php endwhile;?>
                </datalist>
                <br>
                <label for="nick_testigo">Nick del testigo:</label>
                <?php $nick_testigos=todosNombreTestigoPublicaciones();?>

                <input list="nick_testigo" id="nick_testigo_input" name="nick_testigo">
                <br>
                <datalist id="nick_testigo"  >
                <?php while($testigo=mysqli_fetch_assoc($nick_testigos)):?>
                    
                    <option value='<?=$testigo['nick_testigo'];?>'>
                        <?php endwhile;?>
                </datalist>

                <label for="titulo">Título:</label>
                <?php $titulos=tituloPublicaciones();?>
                
                <input list="titulo" id="titulo_input" name="titulo">
                <datalist id="titulo" >
                <?php while($titulo=mysqli_fetch_assoc($titulos)):?>
                    <option value='<?=$titulo['titulo'];?>'>
                        <?php endwhile;?>
                </datalist>
                <br>

                <label for="dificultad">Dificultad:</label>
                <select id="dificultad" name="dificultad">
                    <option value=""></option>
                    <option value="fácil">Fácil</option>
                    <option value="normal">Normal</option>
                    <option value="difícil">Difícil</option>
                        
                </select>
                <br>

                <label for="duda">Duda:</label>
                <select id="duda" name="duda">
                <option value=""></option>
                    <option value="no">No<option>
                    <option value="si">Sí<option>
                    
                        
                </select>
                <br>

                    <input type="submit" value="Filtrar">
            </form>
        </div>



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
        <p><a class="pub_completa" href="publicacion_completa.php?id=<?=$publicacion['id']?>&&explo=ok">Publicación completa</a></p>
        
        </div>
        <?php endwhile;?>
        <?php endif;?>





    </div>
    <?php $num=contarRegistros('publicaciones')?>
    <?php $pages=ceil($num/10)?>
    <div class="container_publicaciones paginas">
    <?php for($i=1;$i<=$pages;$i++):?>
    <a href="explorar_publicaciones_p.php?page=<?=$i?>"><?=$i?></a>
    <?php endfor;?>
    </div>
</main>
</body>

</html>