<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../models/conexion/conexion.php';

require_once '../../../models/usuario/metas/metas.php';

$meta=new Metas();
?>
<style>
.container{
        background-color: rgba(214, 130, 23, 0.7);
        width: 600px;
        margin: 0px auto;
        margin-top: 40px;
        text-align: center;
        z-index: -100;
        height: 400px;
        overflow: scroll;
        
    }

    #titulo_agregar_meta{
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

    #descripcion_meta{
        margin-top:5px;
        margin-bottom:15px;
        width:500px;
        height:150px;
    }

</style>

<main>
    <div class="container">

       
        <?php if($_GET['metas'] ?? 1 ==0):?>
            <h1>Ahora mismo no tienes ninguna meta.Puedes enrolarte en una meta o crear una nueva</h1>
            <?php endif;?>
            <h2 class="indie-flower-regular" id="titulo_agregar_meta">Agrega una Meta</h2>
        <form action="controllers/usuario/metas/agregar_meta.php" method="POST">
            <label for="nombre_meta" style="font-weight:bold;">Nombre de la meta:</label>
            <br>
            <input list="meta" name="meta" id="meta">
            <datalist id="metas">
                <?php $result = $meta->verMetas(); ?>
                <?php while ($meta = mysqli_fetch_assoc($result)) :; ?>
                    <option value="<?= $meta['nombre_meta']; ?>">
                    <?php endwhile; ?>
                
            </datalist>
            
            <br>
            <label for="descripcion" style="font-weight:bold;">Descripción de la meta:</label>
            <br>
            <textarea placeholder="Agrega una pequeña descripción para que los demás sepan de qué trata" rows="10" cols="100" id="descripcion_meta" name="descripcion">
            </textarea>

            
            <?php if(isset($_SESSION['exito'])):;?> 
            <h2><?= $_SESSION['exito']; ?></h2>
            <?php unset($_SESSION['exito']); ?>
            <?php endif; ?>
            <br>

            <input type="submit" value="Agregar meta">
        </form>








    
    </div>
    
</main>

