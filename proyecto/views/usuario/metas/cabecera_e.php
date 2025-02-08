
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <script src="assets/script.js"></script>
    <title>LOGGED</title>
</head>

<body id="body">
    <header id="header">
        <?php if (isset($_SESSION['usuario'])): ?>

            <h1>Bienvenido <?php echo $_SESSION['usuario']['nick']; ?></h1>
            <?php if (isset($_GET['amistad'])):?>
                <?=$_GET['amistad']?>
                <?php //unset($_GET['amistad'])?>
                <?php endif;?>

                <?php if (isset($_GET['meta'])):?>
                <?=$_GET['meta']?>
                <?php //unset($_GET['meta'])?>
                <?php endif;?>

                <?php if (isset($_GET['familiar'])):?>
                <?=$_GET['familiar']?>
                <?php //unset($_GET['familiar'])?>
                <?php endif;?>

            <?php if (isset($_SESSION['exito'])): ?>
                <h2> <?= $_SESSION['exito']; ?></h2>
                <?php unset($_SESSION['exito']); ?>
            <?php endif; ?>
            <a href="controllers/usuario/logout.php">Cerrar Sesión</a>
        <?php endif; ?>
        <nav>
            <ul>
                <li><a href="index.php">USUARIO</a>
                    <ul>
                        <li><a href="views/usuario/actualizar.php" id="cambiar_datos">Cambiar datos</a></li>
                        <li><a href="views/usuario/amigos/amigos.php" id="ver_amigos">Ver amigos</a>
                    <ul>
                        <li><a href="views/usuario/amigos/agregar_amigos.php" id="agregar_amigos">Agregar amigos</a></li>
                        <li><a href="views/usuario/amigos/solicitudes_pendientes_amigos.php" id="solicitudes_pendientes_amigos">Solicitudes Pendientes</a></li>
                    </ul></li>
                        <li><a href="views/usuario/familiares/familiares.php" id="ver_familiares">Ver familiares</a>
                    <ul>
                    <li><a href="views/usuario/familiares/agregar_familiar.php" id="agregar_familiares">Agregar familiares</a></li>
                    <li><a href="views/usuario/familiares/solicitudes_pendientes_familiares.php" id="solicitudes_pendientes_familiares">Solicitudes Pendientes</a></li>
                    </ul></li>
                        <li><a href="views/usuario/metas/metas.php" id="metas">Ver mis metas</a>
                    <ul>
                    <li><a href="views/usuario/metas/agregar_meta.php" id="agregar_meta">Agregar Meta</a></li>
                    <li><a href="views/usuario/metas/explorar_metas.php" id="explorar_metas">Explorar Metas</a></li>
                    </ul></li>
                        

                    </ul>
                </li>
                <li><a href="publicaciones_v.php">PUBLICACIONES</a>
                    <ul>
                        <li><a href="publicaciones_v.php">Ver mis Publicaciones</a>
                        <li><a href="insertar_publicacion_v.php">Agregar publicación</a></li>

                        <li><a href="explorar_publicaciones_v.php">Explorar</a></li>
                    </ul>
                </li>

                <li><a href="actos_publicos_v.php">Denuncias Públicas</a>
                    <ul>
                        <a href="crear_actos_publicos_v.php">Crear Denuncia</a>
                        <a href="actos_publicos_v.php">Explorar</a>
                    </ul>

                </li>


            </ul>
        </nav>
    </header>
    <main id="principal">
    <script>
    document.getElementById('ver_amigos').addEventListener('click', function (event) {
        event.preventDefault();

        let url = this.href;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('principal').innerHTML = data;
            })
        })

        document.getElementById('ver_familiares').addEventListener('click', function (event) {
        event.preventDefault();

        let url = this.href;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('principal').innerHTML = data;
            })
        })

        document.getElementById('solicitudes_pendientes_amigos').addEventListener('click', function (event) {
        event.preventDefault();

        let url = this.href;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('principal').innerHTML = data;
            })
        })

        document.getElementById('agregar_amigos').addEventListener('click', function (event) {
        event.preventDefault();

        let url = this.href;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('principal').innerHTML = data;
            })
        })

        document.getElementById('solicitudes_pendientes_familiares').addEventListener('click', function (event) {
        event.preventDefault();

        let url = this.href;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('principal').innerHTML = data;
            })
        })

        document.getElementById('agregar_familiares').addEventListener('click', function (event) {
        event.preventDefault();

        let url = this.href;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('principal').innerHTML = data;
            })
        })

        document.getElementById('agregar_familiares').addEventListener('click', function (event) {
        event.preventDefault();

        let url = this.href;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('principal').innerHTML = data;
            })
        })

        document.getElementById('metas').addEventListener('click', function (event) {
        event.preventDefault();

        let url = this.href;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('principal').innerHTML = data;
            })
        })

        document.getElementById('agregar_meta').addEventListener('click', function (event) {
        event.preventDefault();

        let url = this.href;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('principal').innerHTML = data;
            })
        })

        document.getElementById('explorar_metas').addEventListener('click', function (event) {
        event.preventDefault();

        let url = this.href;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('principal').innerHTML = data;
                document.getElementById('container').innerHTML='';
            })
        })

        document.getElementById('abandonar_amistad_a').addEventListener('click', function (event) {
        event.preventDefault();

        let url = this.href;

        fetch(url,{method:'GET'})
            .then(response => response.text())
            .then(data => {
                document.getElementById('principal').innerHTML = data;
            })
        })

        document.getElementById('abandonar_amistad_b').addEventListener('click', function (event) {
        event.preventDefault();

        let url = this.href;

        fetch(url,{method:'GET'})
            .then(response => response.text())
            .then(data => {
                document.getElementById('principal').innerHTML = data;
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
        */
    </script>
    </main>
