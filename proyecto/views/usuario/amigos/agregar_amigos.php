<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../models/conexion/conexion.php';
require_once '../../../models/usuario/amigos/amigos.php';

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

    #titulo_agregar{
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
<main>
    <div class="container">
        <div class="friend">
            


            <?php if (isset($_SESSION['error_nick'])): ?>
                <h2><?= $_SESSION['error_nick']; ?></h2>
                <?php unset($_SESSION['error_nick']); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['error_amistad'])): ?>
                <h2><?= $_SESSION['error_amistad']; ?></h2>
                <?php unset($_SESSION['error_amistad']); ?>
            <?php endif; ?>
            
            <h2 id="titulo_agregar" class="indie-flower-regular">Agregue a un amigo</h2>

            <form action="controllers/usuario/amigos/agregar_amigo.php" method="POST" id="form_agregar">
                <label for="nick_amigo">Nick del amigo:</label>
                <br>
                <input type="text" name="nick_amigo" id="nick_amigo" pattern="[a-zA-Z0-9!@#$%^&*(),.?:{}|<>]+">
                <br>
                <input type="submit" value="Agregar amigo">
            </form>




        </div>
    </div>
</main>
</body>

</html>