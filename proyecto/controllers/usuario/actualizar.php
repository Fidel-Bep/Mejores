
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($_SERVER['REQUEST_METHOD'] === 'POST'){
   
    require_once '../../models/conexion/conexion.php';
   
    require_once '../../models/comprobaciones/comprobaciones.php';
   
    require_once '../../models/validaciones/validaciones.php';
   
    require_once '../../models/usuario/usuario.php';
    
    require_once '../../models/cifrado/cifrado.php';
   

}else{
   
    require_once 'models/conexion/conexion.php';
    require_once 'models/comprobaciones/comprobaciones.php';
    require_once 'models/validaciones/validaciones.php';
    require_once 'models/usuario/usuario.php';

};

class UpdateController{
    private $usuario;
    private $validacion;
    private $comprobar;
    private $cifrar;

    public function __construct() {
        $this->usuario = new Usuario();
        $this->validacion = new Validaciones();
        $this->comprobar= new Comprobaciones();
        $this->cifrar=new Cifrar();
    }

    public function update(){
        $nick = $this->validacion->validacionAlfanumerico($_POST['nick'] ?? '');


        $nombre = $this->validacion->validacionString($_POST['nombre'] ?? '');
        $apellidos = $this->validacion->validacionString($_POST['apellidos'] ?? '');
        if($_POST['email']==''){
            $email='';
        }else{
            $email = $this->validacion->validacionEmail($_POST['email'] ?? '');
        }
        
        
        $provincia = $this->validacion->validacionString($_POST['provincia'] ?? '');
        
        $municipio = $this->validacion->validacionString($_POST['municipio'] ?? '');
        
        $codigo_postal = $this->validacion->validacionAlfanumerico($_POST['codigo_postal'] ?? '');
        
        $principios = $_POST['principios']=="" ? "" :$this->validacion->validacionString($_POST['principios'] ?? '');
        
        $objetivo_moral = $_POST['objetivo_moral']=="" ? "" :$this->validacion->validacionString($_POST['objetivo_moral'] ?? '');
        
        $lema = $_POST['lema']=='' ? '' :$this->validacion->validacionString($_POST['lema'] ?? '');
        if($_POST['password']!=''){
            $password = $this->cifrar->cifrarPassword($_POST['password'] ?? '');
        }else{
            $password='';
        }
        
        

        if($this->comprobar->comprobarNickExiste($nick)){
            
            $_SESSION['nick_error'] = "El nick ya existe";
        }elseif($this->comprobar->comprobarEmailExiste($email)){
            
            $_SESSION['email_error'] = "El email ya existe";
        }

        

        if(!isset($_SESSION['nick_error']) && !isset($_SESSION['email_error'])){
           
            $this->usuario->actualizarDatos($nick, $nombre, $apellidos, $email, $provincia, $municipio, $codigo_postal, $password,$principios, $objetivo_moral, $lema);
            header('Location: ../../index.php');
        }else{
           
            header('Location:../../index.php');
        }
            
            

    }

    
        
   
}

    


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new UpdateController();
        $controller->update();
    }
