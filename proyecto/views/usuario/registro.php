<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../models/conexion/conexion.php'?>


<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <script src="assets/script.js"></script>
  <link rel="stylesheet" href="../../assets/styles_registro.css">
</head>

<body id="body_registro">

<div id="container_registro" style="height:auto;">
<h1 id="h1_registro">Registro</h1>

        <?php if(isset($_SESSION['exito'])): ?>
           <h2> <?=  $_SESSION['exito']; ?></h2>
            <?php unset($_SESSION['exito']);?>
            <?php endif; ?>
        <form action="../../controllers/usuario/registro.php" method="post">
            <label for="nick">Nick de Usuario:</label>
            <br>
            <input type="text" name="nick" id="nick" pattern="[a-zA-Z0-9!@#$%^&*(),.?:{}|<>]+" required>
            <br>
            <?php if(isset($_SESSION['nick_error'])): ?>
           <h4 style="color:red;margin-top:3px;"> <?=  $_SESSION['nick_error']; ?></h2>
            <?php unset($_SESSION['nick_error']);?>
            <?php endif; ?>
            <label for="nombre">Nombre:</label>
            <br>
            <input type="text" name="nombre" id="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" required>
            <br>
            <label for="apellidos">Apellidos:</label>
            <br>
            <input type="text" name="apellidos" id="apellidos" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" required>
            <br>
            <label for="email">Email:</label>
            <br>
            <input type="email" name="email" id="email" required>
            <br>
            <?php if(isset($_SESSION['email_error'])): ?>
           <h4 style="color:red;margin-top:3px;" id="email_error"> <?=  $_SESSION['email_error']; ?></h2>
            <?php unset($_SESSION['email_error']);?>
            <?php endif; ?>
            <label for="provincia">Provincia:</label>
            <br>
            <input type="text" name="provincia" id="provincia" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" required>
            <br>
            <label for="municipio">Municipio:</label>
            <br>
            <input type="text" name="municipio" id="municipio" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" required>
            <br>
            <label for="codigo_postal">Código Postal:</label>
            <br>
            <input type="text" name="codigo_postal" id="codigo_postal" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\-s 0-9]+" required>
            <br>
            <label for="principios">Principios:</label>
            <br>
            <select name="principios" id="principios" >
                <option value="Religiosos">Religiosos</option>
                <option value="Espirituales">Espirituales</option>
                <option value="Ideológicos">Ideológicos</option>
                <option value="Éticos">Éticos</option>
                <option value="Otros">Otros</option>
            </select>
            <br>
            <label for="objetivo_moral">Objetivo Moral:</label>
            <br>
            <input type="text" name="objetivo_moral" id="objetivo_moral" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s.,:;¿?¡!]+">
            <br>
            <label for="lema">Lema:</label>
            <br>
            <input type="text" name="lema" id="lema" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s.,:;¿?¡!]+">
            <br>
            <label for="password">Contraseña:</label>
            <br>
            <input type="password" name="password" id="password" required>
            <br>
            <input type="submit" value="Enviar" class="botones_registro">
            <input type="reset" value="limpiar" class="botones_registro">
            <br>
            <a href="../../index.php" id="volver_registro" style="margin-bottom:10px;">Volver</a>
        </form>
        
        </div>
    <?php if(isset($_SESSION['exito'])): ?>
            <?php unset($_SESSION['exito']);?>
    <?php endif; ?>
    </body>
    </html>
