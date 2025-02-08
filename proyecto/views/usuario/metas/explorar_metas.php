<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../../models/conexion/conexion.php';
require_once '../../../models/filtros/filtros.php';
require_once '../../../models/usuario/metas/metas.php';
$meta=new Metas();

$orden=$_POST['orden'] ?? 'desc';

$offset=$_GET['page'] ?? 0;
$offset=$offset!=0 ? ($offset -1)*10 : 0;



$result = $meta->verMetas(); 








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

     #titulo_metas{
        font-size:30px;
        font-weight: bold;
        margin-top:10px;
     }

     .friend{
            background-color:rgba(183, 120, 38, 0.88);
            
     }

    
     #unirte_meta{
        text-decoration:none;
        
     }
</style>
<main id='principal'>
    <div class="container">
        <!--
        <div class='friend' style="border: 1px solid black; padding: 10px; margin: 10px;">
            <h2>Filtrar metas</h2>
            <form action="http://localhost/proyecto-mejores/proyecto/index.php" method="POST" id="form_filter_meta">
                
               

                <label for="numero_usuario">Ordenar por número de usuarios:</label>
                <select id="numero_usuarios" name="orden">
                    <option value="asc">Ascendente</option>
                    <option value="desc">Descendente</option>
                    
                </select>

                

                    <input type="submit" value="Filtrar" id="submit_filter_meta">
            </form>
        </div>
            -->
        
        <h2 class="indie-flower-regular" id="titulo_metas">Metas</h2>
            
            <?php while ($meta = mysqli_fetch_assoc($result)):;?>
                <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                <h3><?= $meta['nombre_meta']; ?></h3>
                <p><?= $meta['descripcion']; ?></p>
                
                <p><?php //$meta['usuarios']?></p>
                
                <a id="unirte_meta" href="controllers/usuario/metas/agregar_meta.php?meta=<?=$meta['nombre_meta']?>">Unirte a la meta</a>
                </div>
                <?php endwhile;?>
        



    
    
    </div>
    </main>

    <script>
      
                
        
</script>

</body>

</html>