<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'controllers/cabecera.php';
require_once 'controllers/publicaciones/publicaciones.php';
require_once 'controllers/usuario/metas/metas.php';


require_once 'controllers/usuario/login.php';
require_once 'controllers/footer.php';


if(isset($_SESSION['usuario'])){
    $cabecera=new CabeceraController();
    $cabecera->mostrarCabecera();

    
    if(isset($_GET['meta'])){
    
        $meta=new MetaController();
        $meta->cargarMetas();
    }

    if(isset($_GET['publicacion'])){
        $publicaciones= new PublicacionesController(); 
        $publicaciones->mostrarPublicaciones();
        


        
    }



  

 $footer=new footerController();
    $footer->mostrarFooter();



}else{
    $login=new LoginController;
    $login->mostrarLogin();
}
?>
<script>
    
//window.history.replaceState({}, document.title, window.location.pathname);


</script>




