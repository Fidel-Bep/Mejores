<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <script src="assets/script.js"></script>
  <link rel="stylesheet" href="assets/styles_login.css">
  <style>
    @import url(https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap);

    .indie-flower-regular {
    font-family: "Indie Flower", serif;
    font-weight: 400;
    font-style: normal;
}
#logo_mejores:hover{
    font-size: larger;
    cursor:pointer;
}
  </style>
</head>

<body id="body_login">
  <?php if(isset($_SESSION['exito'])):?>
    <h2 style="color:darkseagreen"><?=$_SESSION['exito']?></h2>
    <?php unset($_SESSION['exito']);?>
    <?php endif;?>
    <div id=container_login>
  <h1 id="h1_login" class="indie-flower-regular ">Login</h1>
  <form action="controllers/usuario/login.php" method="post">
    <label for="nick">Nick de Usuario:</label>
    <br>
    <input type="text" name="nick" id="nick" required>
    <br>
    <?php if (isset($_SESSION['nick_error'])): ?>
      <h2> <?= $_SESSION['nick_error']; ?></h2>
      <?php unset($_SESSION['nick_error']); ?>
    <?php endif; ?>
    <label for="password">Contraseña:</label>
    <br>
    <input type="password" name="password" id="password" required>
    <br>
    <?php if (isset($_SESSION['password_error'])): ?>
      <h2> <?= $_SESSION['password_error']; ?></h2>
      <?php unset($_SESSION['password_error']); ?>
    <?php endif; ?>
    <input type="submit" value="Enviar">
  </form>
  <a href='views/usuario/registro.php' id="a_registro">¿Quieres registrarte?</a>
  <h3 id="logo_mejores" class="indie-flower-regular" style="font-weight:bold;">MEJORES</h3>
  </div>
</body>

</html>