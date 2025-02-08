<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(file_exists('../../models/validaciones/validaciones.php')){
   
    require_once '../../models/conexion/conexion.php';
   
    

    require_once '../../models/comentarios/comentarios.php';
   
    require_once '../../models/validaciones/validaciones.php';
   
   
    
    $comment=new Comentario();
   

}else{
   
    require_once 'models/conexion/conexion.php';
    
    require_once 'models/validaciones/validaciones.php';
    
    require_once 'models/comentarios/comentarios.php';

};

$validar=new Validaciones();

$id=$validar->validacionNumero($_GET['id']);

$comentario=$validar->validacionAlfanumerico($_POST['comentario']);

$duda=$_POST['duda']; 
$testigo=$_POST['testigo'];
$usuario=$_POST['usuario'];

$comment->agregarComentario($id,$_SESSION['usuario']['nick'],$duda,$testigo,$usuario,$comentario);
$_SESSION['comentario']="Comentario agregado correctamente";
header("Location:../../views/publicaciones/publicacion_completa.php?id=$id");

?>