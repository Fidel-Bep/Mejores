<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['nick'])){
    require_once '../../models/conexion/conexion.php';
    require_once '../../models/comprobaciones/comprobaciones.php';
    require_once '../../models/validaciones/validaciones.php';
    require_once '../../models/usuario/usuario.php';

}else{
    require_once 'models/conexion/conexion.php';
    require_once 'models/comprobaciones/comprobaciones.php';
    require_once 'models/validaciones/validaciones.php';
    require_once 'models/usuario/usuario.php';

};


class LoginController {
    private $usuario;
    private $validar;

    public function __construct() {
        $this->usuario = new Usuario();
        $this->validar = new Validaciones();
    }

    public function login() {
        $nick = $this->validar->validacionAlfanumerico($_POST['nick']);
        $password = $_POST['password'];

        $result = $this->usuario->login($nick, $password);
        if (isset($_SESSION['nick_error']) || isset($_SESSION['password_error'])) {
            header('Location:../../index.php');
        } 
        header('Location:../../index.php');
    }

    public function mostrarLogin(){
        require_once 'views/usuario/login.php';
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new LoginController();
    $controller->login();
}


