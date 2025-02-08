<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../models/publicaciones/publicaciones.php';
require_once '../../models/usuario/metas/metas.php';
require_once '../../models/conexion/conexion.php';
require_once '../../models/validaciones/validaciones.php';
$validar = new Validaciones();
$pub = new Publicacion();
$metaC = new Metas();
if (isset($_GET['explo']) && $_GET['explo'] == 'OK') {
    $variable = $_GET['explo'];
}
?>

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

    #titulo_amigos {
        font-size: 30px;
        font-weight: bold;
        margin-top: 10px;
    }

    .friend {
        background-color: rgba(183, 120, 38, 0.88);

    }

    #abandonar_amistad_a,
    #abandonar_amistad_b {
        text-decoration: none;

    }

    #volver_publicacion {
        margin-top: 10px;
        text-decoration: none;
        border: 1px solid black;
        background-color: rgba(183, 120, 38, 0.88);
        color: white;
    }

    .h2_comp {
        font-weight: bold;
        font-size: 30px;
    }

    img {
        width: 300px;
        height: 300px;
    }

    .a_comp {
        text-decoration: none;
    }
</style>

<script>
    window.addEventListener('load', () => {

        var verComentarios = document.getElementById('ver');
        var insertar = document.getElementById('insertar_datos');
        verComentarios.addEventListener('click', function(e) {
            e.preventDefault();
            let url = this.href;
            fetch(url, {
                    method: "GET"
                })
                .then(respuesta => respuesta.text())
                .then(data => {
                    insertar.innerHTML = data;
                })

        })


        var agregarCom = document.getElementById('agregar');

        agregarCom.addEventListener('click', function(e) {
            e.preventDefault();
            let url = this.href;
            fetch(url, {
                    method: "GET"
                })
                .then(respuesta => respuesta.text())
                .then(data => {
                    insertar.innerHTML = data;
                    
                    
                })
                
                   
            

        })

    })
</script>
<main>

    <div class="container">
        <?php if(isset($_GET['explo']) && $_GET['explo']=="ok"):?>
            <a href="explorar_publicaciones_p.php" id="volver_publicacion">Volver</a>
            <?php else:?>
        <a href="../../index.php?publicacion=ok" id="volver_publicacion">Volver</a>
        <?php endif;?>

        <?php $id = $validar->validacionNumero($_GET['id']); ?>
        <?php $result = $pub->verMisPublicacionesPorId($id); ?>



        <h2 class="indie-flower-regular h2_comp">Publicación</h2>
        <?php if (isset($_SESSION['comentario'])):?>
            <p style="color:darkgreen"><?=$_SESSION['comentario']?></p>
            <?php unset($_SESSION['comentario'])?>
            <?php endif;?>

        <?php while ($publicacion = mysqli_fetch_assoc($result)):; ?>
            <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                <h2><?= $publicacion['titulo']; ?></h2>
                <p><?= "Usuario: " . $publicacion['nick_usuario']; ?></p>
                <p><?= "Testigo: " . $publicacion['nick_testigo']; ?></p>
                <p><?= "Comentario usuario: <br>" . $publicacion['comentario_usuario']; ?></p>
                <p><?= "Comentario testigo: <br>" . $publicacion['comentario_testigo']; ?></p>

                <?php if (!empty($publicacion['id_meta'])): ?>
                    <p><?= "Meta:" . $metaC->verMetasNombre($publicacion['id_meta']) ?></p>
                <?php endif; ?>
                <p><?= 'Dificultad:' . $publicacion['dificultad']; ?></p>
                <p><?= 'Puntuacion:' . $publicacion['puntuacion']; ?></p>
                <p><?= 'Comentario del tribunal:' . $publicacion['tribunal_comentario']; ?></p>

                <p><?= $publicacion['fecha_creacion']; ?></p>
                <p><?= $publicacion['fecha_modificacion'] ?></p>
                <a class="a_comp" id="ver" href="comentarios.php?id=<?= $id ?>">Ver comentarios</a>
                <a class="a_comp" id="agregar" href="agregar_comentario.php?id=<?= $id ?>">Agregar comentarios</a>


            </div>
            <div id="insertar_datos">

            </div>
        <?php endwhile; ?>


        <?php $resultado = $pub->verPruebasDePublicacion($id) ?>
        <?php if (mysqli_num_rows($resultado) != 0): ?>

            <?php while ($prueba = mysqli_fetch_assoc($resultado)): ?>
                <div class='friend' style="border: 1px solid black; padding: 10px; margin: 10px;">
                    <p><?= "Nick que aportó la prueba: " . $prueba['nick_aportador'] ?></p>

                    <img src='<?= '../' . substr($prueba['prueba'], 3) ?>' width='100px' height='100px'>


                </div>
            <?php endwhile; ?>
        <?php endif; ?>






    </div>
</main>
</body>

</html>