<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../models/conexion/conexion.php';
require_once '../../../models/usuario/familiares/familiares.php';
$familiar= new Familiar();
?>
<style>
    .container {
        background-color: rgba(214, 130, 23, 0.7);
        width: 600px;
        margin: 0px auto;
        margin-top: 40px;
        text-align: center;
        z-index: -100;
        height: auto;
        overflow: scroll;
    }

    #titulo_familiares {
        font-size: 30px;
        font-weight: bold;
        margin-top: 10px;
    }

    .friend {
        background-color: rgba(183, 120, 38, 0.88);

    }

    #aban_familiar_a,
    #aban_familiar_b {
        text-decoration: none;

    }

    h3{
        color:beige;
    }
</style>
<main>
    <div class="container">


        <?php $result = $familiar->verFamiliares($_SESSION['usuario']['nick']); ?>

        <?php if (mysqli_num_rows($result) == 0):; ?>

            <h2 class="indie-flower-regular">Aún no has agregado ningún familiar</h2>

        <?php else:; ?>

            <h2 id="titulo_familiares" class="indie-flower-regular">Familiares</h2>

            <?php while ($familiar = mysqli_fetch_assoc($result)):; ?>
                <?php if ($familiar['nick_usuario'] == $_SESSION['usuario']['nick']):; ?>
                    <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                        <h3><?= $familiar['nick_familiar']; ?></h3>
                        <p><?= $familiar['solicitud_familia']; ?></p>
                        <p><a id ="aban_familiar_a" href="controllers/usuario/familiares/abandonar.php?familiar=<?= $familiar['nick_familiar'] ?>">Abandonar Familiar</a></p>
                    </div>
                <?php else:; ?>

                    <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                        <h3><?= $familiar['nick_usuario']; ?></h3>
                        <p><?= $familiar['solicitud_familia']; ?></p>
                        <p><a id ="aban_familiar_b" href="controllers/usuario/familiares/abandonar.php?familiar=<?= $familiar['nick_usuario'] ?>">Abandonar Familiar</a></p>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>


                    </div>
    </div>
</main>
</body>

</html>