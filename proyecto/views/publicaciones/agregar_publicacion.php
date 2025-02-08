<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(file_exists('../../models/publicaciones/publicaciones.php')) {
    require_once '../../models/publicaciones/publicaciones.php';
    require_once '../../models/conexion/conexion.php';
    require_once '../../models/validaciones/validaciones.php';
    require_once '../../models/usuario/metas/metas.php';
   
}else{
    require_once 'models/publicaciones/publicaciones.php';
    require_once 'models/conexion/conexion.php';
    require_once 'models/validaciones/validaciones.php';
    require_once 'models/usuario/metas/metas.php';
    
    
}
$metaC=new Metas();
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
      
    }

    .titulo_agregar{
        margin-top:10px;
        margin-bottom:15px;
        font-weight: bold;
        font-size:30px;
    }

    input{
        margin-top:5px;
        margin-bottom:15px;
        height: 30px;
    }

    label{
        font-weight: bold;
    }

    textarea{
        width:400px;
        height:100px;
    }

</style>

    <div class="container">
        
           
            


            <?php if(isset($_SESSION['publicacion_vacia'])):?>
                <h2><?=$_SESSION['publicacion_vacia']?></h2>
                <?php unset($_SESSION['publicacion_vacia'])?>
                <?php endif;?>

            <h2 class="titulo_agregar indie-flower-regular">Agrega una publicacion</h2>
            
            <form action="http://localhost/proyecto-mejores/proyecto/controllers/publicaciones/agregar_publicacion.php" method="POST" enctype="multipart/form-data">
                <label for="eleccion_ut" style="font-weight:bold;">Elige entre usuario de la acción o testigo de la misma</label>
                <br>
                <select name="eleccion_ut" id="eleccion_ut" style="margin-top:5px;margin-bottom:15px;">
                    <option value="testigo">Testigo</option>
                    <option value="usuario">Usuario</option>
                </select>
                <br>
                <label for="titulo">Título:</label>
                <br>
                <input type="text" name="titulo" id="titulo" pattern="[a-zA-Z0-9!@#$%^&*(),.?:{}|<>]+" required>
                <br>
                <label for="comentario_usuario">Comentario del usuario:</label>
                <br>
                <textarea rows=5 cols=50 name="comentario_usuario" id="comentario_usuario" pattern="[a-zA-Z0-9!@#$%^&*(),.?:{}|<>]+"></textarea>
                <br>
                <label for="comentario_testigo">Comentario del testigo:</label>
                <br>
                <textarea rows=5 cols=50 name="comentario_testigo" id="comentario_testigo" pattern="[a-zA-Z0-9!@#$%^&*(),.?:{}|<>]+"></textarea>
                <br>
                <label for="meta">Meta:</label>
                <br>
                <?php $result=$metaC->verMisMetas($_SESSION['usuario']['nick']);?>
                <?php if(mysqli_num_rows($result)==0):?>
                    <p style="color:beige;"><?='Aún no tiene ninguna meta agregada'?></p>
                    <?php else:;?>
                <select name="meta" id="meta_publicacion">
                    <?php while($meta=mysqli_fetch_assoc($result)):?>
                        <option value=''></option>
                        <option value='<?=$meta['nombre_meta']?>'><?=$meta['nombre_meta']?></option>
                    <?php endwhile;?>
                </select>
                <br>
                <?php endif;?>
                <label for="puntuacion">Puntuación otorgada:</label>
                <br>
                <input type="number" name="puntuacion" id="puntuacion" pattern="[0-9]+" required>
                <br>
                
                <label for="prueba">Agregar prueba</label>
                <br>
                <input type="file" name="prueba" id="prueba">
                <br>

                <input type="submit" value="Agregar publicación">
            </form>




        
    </div>
   


