  
        


   
    <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(file_exists('../../models/publicaciones/publicaciones.php')) {
    require_once '../../models/publicaciones/publicaciones.php';
    require_once '../../models/conexion/conexion.php';
    require_once '../../models/validaciones/validaciones.php';
}else{
    require_once 'models/publicaciones/publicaciones.php';
    require_once 'models/conexion/conexion.php';
    require_once 'models/validaciones/validaciones.php';
}
$validar=new Validaciones();
$id=$validar->validacionNumero($_GET['id']);

?>
<style>
.container_comentario{
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

    <div class="container_comentario">     
           
            
            <h2 class="titulo_agregar indie-flower-regular">Agrega un comentario</h2>
            <form action="../../controllers/comentarios/agregar_comentario.php?id=<?=$id?>" method="POST" id="agregar_comentario">

            <label for="comentario">Comentario</label>
            <br>
            <textarea cols="50" rows="10" name="comentario" id=comentario></textarea>
            <br>

            <label for="duda">¿Dudas?</label>
            <br>
            <select name="duda" id="duda">
            <option value="si">Sí</option>
            <option value="no">No</option>
            </select>
            <br>

            <label for="testigo">¿Eres testigo?</label>
            <br>
            <select name="testigo" id="testigo">
            <option value="si">Sí</option>
            <option value="no">No</option>
            </select>
            <br>

            <label for="usuario">¿Eres el usuario?</label>
            <br>
            <select name="usuario" id="usuario">
            <option value="si">Sí</option>
            <option value="no">No</option>          
        
            </select>
            <br>


                <input type="submit" value="Agregar comentario" id="agregar_comentario_sub">
            </form>



           



        
    </div>
