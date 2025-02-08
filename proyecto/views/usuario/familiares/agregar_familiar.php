<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../models/conexion/conexion.php';
require_once '../../../models/usuario/familiares/familiares.php';
 ?>
 <style>
 .container{
        background-color: rgba(214, 130, 23, 0.7);
        width: 600px;
        margin: 0px auto;
        margin-top: 40px;
        text-align: center;
        z-index: -100;
        height: 300px;
        overflow: scroll;
        
    }

    #titulo_agregar_familiar{
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
</style>
<main id="principal">
    <div class="container">
       
            


            <?php if (isset($_SESSION['error_nick'])): ?>
                <h2><?= $_SESSION['error_nick']; ?></h2>
                <?php unset($_SESSION['error_nick']); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['error_familia'])): ?>
                <h2><?= $_SESSION['error_familia']; ?></h2>
                <?php unset($_SESSION['error_familia']); ?>
            <?php endif; ?>

            <h2 id="titulo_agregar_familiar" class="indie-flower-regular">Agregue a un familiar</h2>

            <form action="controllers/usuario/familiares/agregar_familiar.php" method="POST">
                <label for="nick_familiar">Nick del familiar:</label>
                <br>
                <input type="text" name="nick_familiar" id="nick_familiar" pattern="[a-zA-Z0-9!@#$%^&*(),.?:{}|<>]+">
                <br>
                <input type="submit" value="Agregar familiar">
            </form>




       
    </div>
</main>
</body>

</html>