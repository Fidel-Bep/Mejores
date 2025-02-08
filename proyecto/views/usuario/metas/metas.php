<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!isset($_GET['meta'])){
    require_once '../../../models/conexion/conexion.php';
    require_once '../../../models/usuario/metas/metas.php';
}else{
    require_once 'models/conexion/conexion.php';
    require_once 'models/usuario/metas/metas.php';
}
$meta=new Metas();
?>
<style>
    .friend{
        background-color:rgba(183, 120, 38, 0.88);
    }
    #container_metas{
        background-color: rgba(214, 130, 23, 0.7);
        width: 600px;
        margin: 0px auto;
        margin-top: 40px;
        text-align: center;
        z-index: -100;
        height: auto;
        overflow: scroll;

    }

    #h2_metas{
        margin-top:5px;
        margin-bottom:10px;
        font-size:30px;
        font-weight:bold;
    }

    h3{
        color:beige;
        font-size:20px;
        font-weight: bold;
    }

    #descripcion{
        font-weight: bold;
    }

    #aban_meta{
        text-decoration:none;
    }

    #fecha_meta{
        color:darkkhaki;
        margin-top:10px;
        margin-top:10px;
    }
</style>
    <div id="container_metas">

        

        <?php $result = $meta->verMisMetas($_SESSION['usuario']['nick']); ?>

        <?php if (mysqli_num_rows($result) == 0):; ?>

            <h3 class="indie-flower-regular"><?="No tienes ninguna meta agregada"?></h3>

        <?php else:; ?>


            <h2 class="indie-flower-regular" id="h2_metas"><?= 'Metas' ?></h2>
            <?php $mis_metas = $meta->verMisMetas($_SESSION['usuario']['nick']); ?>
            <?php while ($meta = mysqli_fetch_assoc($mis_metas)):; ?>
                <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                    <h3 class="indie-flower-regular"><?= $meta['nombre_meta']; ?></h3>
                    <p id="descripcion"><?= $meta['descripcion']; ?></p>
                    <p id="fecha_meta"><?= $meta['fecha_creacion']; ?></p>

                    <p><?= $meta['puntuacion_meta']; ?></p>
                    <a id="aban_meta" href="controllers/usuario/metas/abandonar.php?meta=<?= $meta['id'] ?>">Abandonar</a>
                </div>
            <?php endwhile; ?>

        <?php endif; ?>

        <?php if(isset($_GET['meta'])):?>
            <?php unset($_GET['meta'])?>
            <?php endif;?>





    </div>



