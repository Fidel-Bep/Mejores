<style>
    #principal {
        background-color: rgba(214, 130, 23, 0.7);
        width: 600px;
        margin: 0px auto;
        margin-top: 40px;
        text-align: center;
        z-index: -100;
        height: 500px;
        overflow: scroll;
    }

    #titulo_cambiar{
        margin-top:10px;
        margin-bottom:10px;
        font-weight: bold;
    }

    #container input {
        margin-top: 5px;
        margin-bottom: 10px;
        width: 400px;
        height: 30px;
    }

    #principios {
        margin-top: 5px;
        margin-bottom: 10px;
    }

    #form_actualizar {
        color: white;
        height: 45px;
        width: 65px;
        background-color: coral;
        border-radius: 10px;
        cursor:pointer;

    }
</style>
<main id="principal">
    <div id="container">



        <h1 class="indie-flower-regular" id="titulo_cambiar">¿Qué quieres cambiar?</h1>
        <?php if (isset($_SESSION['error_registro_actualizar'])): ?>
            <h2> <?= $_SESSION['error_registro_actualizar']; ?></h2>
            <?php unset($_SESSION['error_registro_actualizar']); ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['exito'])): ?>
            <h2> <?= $_SESSION['exito']; ?></h2>
            <?php unset($_SESSION['exito']); ?>
        <?php endif; ?>

        <form action="controllers/usuario/actualizar.php" method="post">
            <label for="nick">Nick de Usuario:</label>
            <br>
            <input type="text" name="nick" id="nick" pattern="[a-zA-Z0-9!@#$%^&*(),.?:{}|<>]+" placeholder="Te has cansado ya de este nombre?">
            <br>
            <?php if (isset($_SESSION['nick_error'])): ?>
                <h2> <?= $_SESSION['nick_error']; ?></h2>
                <?php unset($_SESSION['nick_error']); ?>
            <?php endif; ?>
            <label for="nombre">Nombre:</label>
            <br>
            <input type="text" name="nombre" id="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" placeholder="Pero cómo te vas a cambiar el nombre">
            <br>
            <label for="apellidos">Apellidos:</label>
            <br>
            <input type="text" name="apellidos" id="apellidos" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" placeholder="Del apellido ya ni hablamos">
            <br>
            <label for="email">Email:</label>
            <br>
            <input type="email" name="email" id="email" placeholder="Haces bien, yo me hice uno distinto para...">
            <br>
            <?php if (isset($_SESSION['email_error'])): ?>
                <h2> <?= $_SESSION['email_error']; ?></h2>
                <?php unset($_SESSION['email_error']); ?>
            <?php endif; ?>
            <label for="provincia">Provincia:</label>
            <br>
            <input type="text" name="provincia" id="provincia" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" placeholder="Tranquilo Willy Fog">
            <br>
            <label for="municipio">Municipio:</label>
            <br>
            <input type="text" name="municipio" id="municipio" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" placeholder="El bar de la esquina no se considera municipio">
            <br>
            <label for="codigo_postal">Código Postal:</label>
            <br>
            <input type="text" name="codigo_postal" id="codigo_postal" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\-s 0-9]+" placeholder="007">
            <br>
            <label for="principios">Principios:</label>
            <br>
            <select name="principios" id="principios">
                <option value="Religiosos">Religiosos</option>
                <option value="Espirituales">Espirituales</option>
                <option value="Ideológicos">Ideológicos</option>
                <option value="Éticos">Éticos</option>
                <option value="Otros">Otros</option>
            </select>
            <br>
            <label for="objetivo_moral">Objetivo Moral:</label>
            <br>
            <input type="text" name="objetivo_moral" id="objetivo_moral" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s.,:;¿?¡!]+" placeholder="Intenta ser realista">
            <br>
            <label for="lema">Lema:</label>
            <br>
            <input type="text" name="lema" id="lema" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s.,:;¿?¡!]+" placeholder="Me da que esto es lo que más se va a cambiar">
            <br>
            <label for="password">Contraseña:</label>
            <br>
            <input type="password" name="password" id="password" placeholder="1234 ya está cogida">
            <br>
            <input type="submit" value="Enviar" id="form_actualizar">
        </form>
    </div>
</main>