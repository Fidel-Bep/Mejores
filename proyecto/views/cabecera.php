<?php
include 'models/conexion/conexion.php';



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <script src="assets/script.js"></script>


    <title>MEJORES</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');

        * {
            margin: 0px;
            padding: 0px;
        }

        #body {
            background-image: url(assets/img/hojas_fondo.jpg);
        }

        .indie-flower-regular {
            font-family: "Indie Flower", serif;
            font-weight: 400;
            font-style: normal;
        }


        .clearfix {
            clear: both;
            float: none;
        }

        #container_cabecera {
            margin: 0px auto;

            width: 1350px;
        }

        #superior {
            width: 100%;
            height: 200px;
            border: 1px solid black;
            background-color: rgba(245, 155, 39, 0.8);
        }

        #bienvenida {
            font-size: 45px;
            margin-top: 72px;
            width: 80%;
        }

        #cerrar_sesion {
            margin-top: -138px;
            margin-right: 10px;
            letter-spacing: -5px;
            text-decoration: none;
            font-size: 20px;
            float: right;
            padding: 10px;
            transition: 500ms all;
        }

        #cerrar_sesion:hover {
            letter-spacing: 10px;
        }

        #cerrar_sesion:visited {
            color: black;
        }

        ul {
            list-style: none;

        }



        li {
            float: left;
            width: 19.853%;
            background-color: rgba(245, 155, 39, 0.96);
            text-align: center;
            padding-top: 15px;
            font-size: 20px;
            height: 50px;
            border: 1px solid rgba(214, 130, 23, 0.88);
            cursor: pointer;
        }

        li:hover .li_within {
            display: block;
        }

        li:hover {
            background-color: rgba(183, 120, 38, 0.88);
            color: chocolate;
        }

        li a {
            margin-top: 10px;
            width: 100%;
            height: 100%;
            text-decoration: none;

        }

        .li_within {
            width: 100%;
            position: relative;
            height: 50px;
            line-height: 50px;
            font-size: 15px;
            cursor: pointer;
            display: none;

        }

        .solicitudes {
            font-size: 40px;
            color: green;
        }
    </style>
</head>

<body id="body">
    <header id="header">
        <div id="container_cabecera">
            <?php if (isset($_SESSION['usuario'])): ?>
                <div id="superior">

                    <h1 id="bienvenida" class="indie-flower-regular">Bienvenido <?php echo $_SESSION['usuario']['nick']; ?>, ¿con ganas de ser mejor?</h1>
                    <?php if (isset($_GET['amistad']) && $_GET['amistad'] != "Amistad agregada"): ?>
                       
                        <h3 style="color:green;" id="h3_amistad"><?= $_GET['amistad'] ?></h3>
                        <script>
                            window.addEventListener('load', () => {
                                

                                var h3_amistad = document.getElementById('h3_amistad');
                               
                                if(h3_amistad.innerHTML.includes("error") || h3_amistad.innerHTML.includes("Error")){
                                    h3_amistad.style.color="red"
                                }

                                setTimeout(() => {
                                    h3_amistad.style.display = 'none';
                                }, 2000);
                            })
                        </script>

                        <?php unset($_GET['amistad'])
                        ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['error_nick'])): ?>
                        <h2><?= $_SESSION['error_nick']; ?></h2>
                        
                        <?php unset($_SESSION['error_nick']); ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['error_amistad'])): ?>
                        <h2 id="error_amistad" ><?= $_SESSION['error_amistad']; ?></h2>
                        <script>
                            window.addEventListener('load', () => {
                                console.log('Ejecutado')
                                var h3_error = document.getElementById('error_amistad');

                                setTimeout(() => {
                                    h3_error.style.display = 'none';
                                }, 5000);
                            })
                        </script>
                        <?php unset($_SESSION['error_amistad']); ?>
                    <?php endif; ?>
                    <?php if (isset($_GET['meta']) && $_GET['meta'] !="Meta agregada"): ?>
                        <h3 id="h3_meta_get"><?= $_GET['meta'] ?></h3>
                        <script>
                            window.addEventListener('load', () => {
                                
                                var h3_meta = document.getElementById('h3_meta_get');
                                if(h3_meta.innerHTML.includes("error") || h3_meta.innerHTML.includes("Error")){
                                    h3_meta.style.color="red";
                                }

                                setTimeout(() => {
                                    h3_meta.style.display = 'none';
                                }, 2000);
                            })
                        </script>
                        <?php unset($_GET['meta'])
                        ?>
                    <?php endif; ?>

                    <?php if (isset($_GET['familiar']) && $_GET['familiar'] != "Familiar agregado"): ?>
                        <h3 id="familiar_h3"><?= $_GET['familiar'] ?></h3>
                        <script>
                            window.addEventListener('load', () => {
                                
                                var h3_familiar = document.getElementById('familiar_h3');
                                if(h3_familiar.innerHTML.includes("error") || h3_familiar.innerHTML.includes("Error")){
                                    h3_familiar.style.color="red";
                                }

                                setTimeout(() => {
                                    h3_familiar.style.display = 'none';
                                }, 2000);
                            })
                        </script>
                        <?php unset($_GET['familiar'])
                        ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['exito'])): ?>
                        <h3 class="indie-flower-regular solicitudes" id="solicitud_enviada_familiar"> <?= $_SESSION['exito']; ?></h3>
                        <script>
                            window.addEventListener('load', () => {
                                console.log('Ejecutado')
                                var h3_enviada = document.getElementById('solicitud_enviada_familiar');

                                setTimeout(() => {
                                    h3_enviada.style.display = 'none';
                                }, 5000);
                            })
                        </script>
                        <?php unset($_SESSION['exito']); ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['nick_error'])): ?>
                        <h3 class="indie-flower-regular solicitudes" id="solicitud_enviada_familiar" style="color:red;"> <?= $_SESSION['nick_error']; ?></h3>
                        <script>
                            window.addEventListener('load', () => {
                                console.log('Ejecutado')
                                var h3_enviada = document.getElementById('solicitud_enviada_familiar');

                                setTimeout(() => {
                                    h3_enviada.style.display = 'none';
                                }, 5000);
                            })
                        </script>
                        <?php unset($_SESSION['nick_error']); ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['email_error'])): ?>
                        <h3 class="indie-flower-regular solicitudes" id="solicitud_enviada_familiar" style="color:red;"> <?= $_SESSION['email_error']; ?></h3>
                        <script>
                            window.addEventListener('load', () => {
                                console.log('Ejecutado')
                                var h3_enviada = document.getElementById('solicitud_enviada_familiar');

                                setTimeout(() => {
                                    h3_enviada.style.display = 'none';
                                }, 5000);
                            })
                        </script>
                        <?php unset($_SESSION['email_error']); ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['email_error_v'])): ?>
                        <h3 class="indie-flower-regular solicitudes" id="solicitud_enviada_familiar" style="color:red;"> <?= $_SESSION['email_error_v']; ?></h3>
                        <script>
                            window.addEventListener('load', () => {
                                console.log('Ejecutado')
                                var h3_enviada = document.getElementById('solicitud_enviada_familiar');

                                setTimeout(() => {
                                    h3_enviada.style.display = 'none';
                                }, 5000);
                            })
                        </script>
                        <?php unset($_SESSION['email_error_v']); ?>
                    <?php endif; ?>
                    <a href="controllers/usuario/logout.php" id="cerrar_sesion" class="indie-flower-regular">¡Me tengo que ir!</a>
                </div>
                <div class="clearfix"></div>
            <?php endif; ?>
            <nav>
                <ul class="menu_nav">
                    <li><a href="index.php" class="indie-flower-regular" id="first">EGO</a>
                        <ul>
                            <li class="li_within">
                                <a href="views/usuario/actualizar.php" id="cambiar_datos">Cambiar datos</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="views/usuario/amigos/amigos.php" id="ver_amigos" class="indie-flower-regular">LOS MÍOS</a>
                        <ul>
                            <li class="li_within">
                                <a href="views/usuario/amigos/agregar_amigos.php" id="agregar_amigos">Agregar amigos</a>
                            </li>
                            <li class="li_within">
                                <a href="views/usuario/amigos/solicitudes_pendientes_amigos.php" id="solicitudes_pendientes_amigos">Solicitudes Pendientes</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="views/usuario/familiares/familiares.php" id="ver_familiares" class="indie-flower-regular">LOS DE SANGRE</a>
                        <ul>
                            <li class="li_within">
                                <a href="views/usuario/familiares/agregar_familiar.php" id="agregar_familiares">Agregar familiares</a>
                            </li>
                            <li class="li_within">
                                <a href="views/usuario/familiares/solicitudes_pendientes_familiares.php" id="solicitudes_pendientes_familiares">Solicitudes Pendientes</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="views/usuario/metas/metas.php" id="metas" class="indie-flower-regular">VOY PA YÁ</a>
                        <ul>
                            <li class="li_within"><a href="views/usuario/metas/agregar_meta.php" id="agregar_meta">Agregar Meta</a></li>
                            <li class="li_within"><a href="views/usuario/metas/explorar_metas.php" id="explorar_metas">Explorar Metas</a></li>
                        </ul>
                    </li>

                    <li><a href="views/publicaciones/publicaciones.php" class="indie-flower-regular" id="pub">Y ESTO Y LO OTRO</a>
                        <ul>
                            <li class="li_within">
                                <a href="views/publicaciones/publicaciones.php" id="publicaciones">Ver mis Publicaciones</a>
                            </li>
                            <li class="li_within">
                                <a href="views/publicaciones/agregar_publicacion.php" id="agregar_publicacion">Agregar publicación</a>
                            </li>
                            <li class="li_within">
                                <a href="views/publicaciones/explorar_publicaciones_p.php" id="explorar_publicacion">Explorar publicaciones</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="clearfix"></div>
    </header>
    <main id="principal">
        <script>
            document.getElementById('agregar_publicacion').addEventListener('click', function(event) {
                
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';
                        document.getElementById('container_publicaciones').innerHTML = '';

                    })
            })

            document.getElementById('pub').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';
                        

                    })
            })
            document.getElementById('cambiar_datos').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';
                        document.getElementById('container_publicaciones').innerHTML = '';

                    })
            })
            document.getElementById('publicaciones').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {

                        document.getElementById('principal').innerHTML = data;


                    })
            })

            document.getElementById('ver_amigos').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {

                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';
                        document.getElementById('container_publicaciones').innerHTML = '';
                    })
            })

            document.getElementById('ver_familiares').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';
                        document.getElementById('container_publicaciones').innerHTML = '';
                    })
            })

            document.getElementById('solicitudes_pendientes_amigos').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';
                        document.getElementById('container_publicaciones').innerHTML = '';
                    })
            })

            document.getElementById('agregar_amigos').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';
                        document.getElementById('container_publicaciones').innerHTML = '';
                    })
            })

            document.getElementById('solicitudes_pendientes_familiares').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';
                        document.getElementById('container_publicaciones').innerHTML = '';
                    })
            })

            document.getElementById('agregar_familiares').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';
                        document.getElementById('container_publicaciones').innerHTML = '';
                    })
            })

            document.getElementById('agregar_familiares').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';
                        document.getElementById('container_publicaciones').innerHTML = '';
                    })
            })

            document.getElementById('metas').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;

                        document.getElementById('container_publicaciones').innerHTML = '';
                    })
            })

            document.getElementById('agregar_meta').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';
                        document.getElementById('container_publicaciones').innterHTML='';
                       
                        
                    })
            })

            document.getElementById('explorar_metas').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';
                        document.getElementById('container_publicaciones').innerHTML = '';
                    })
            })

            document.getElementById('abandonar_amistad_a').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url, {
                        method: 'GET'
                    })
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';
                        document.getElementById('container_publicaciones').innerHTML = '';
                    })
            })

            document.getElementById('abandonar_amistad_b').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url, {
                        method: 'GET'
                    })
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';
                        document.getElementById('container_publicaciones').innerHTML = '';
                    })
            })
            /*
                    var formulario_filter=document.getElementById('form_filter_meta')
                    formulario.addEventListener('submit',function(event){
                        event.preventDefault();

                        var form_info=new FormData(formulario)

                        fetch('views/usuario/metas/explorar_metas',{
                            method:'POST',body: form_info})
                            .then(response=>response.text())
                            .then(data=> {
                                document.getElementById('principal').innerHTML=data
                            })
                            
                        })
             /*       
            document.getElementById('publicaciones').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';


                    })
            })

            document.getElementById('agregar_publicacion').addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('principal').innerHTML = data;
                        document.getElementById('container_metas').innerHTML = '';

                    })
            })*/
        </script>
        
    </main>