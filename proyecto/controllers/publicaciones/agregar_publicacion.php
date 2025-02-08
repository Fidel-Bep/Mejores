<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(file_exists('../../models/validaciones/validaciones.php')){
   
    require_once '../../models/conexion/conexion.php';
   
    require_once '../../models/usuario/metas/metas.php';

    require_once '../../models/comentarios/comentarios.php';
   
    require_once '../../models/validaciones/validaciones.php';
    require_once '../../models/publicaciones/publicaciones.php';
   
   
    
    
   

}else{
   
    require_once 'models/conexion/conexion.php';
    require_once 'models/usuario/metas/metas.php';

    require_once 'models/publicaciones/publicaciones.php';
    
    require_once 'models/validaciones/validaciones.php';
    
    require_once 'models/comentarios/comentarios.php';

};
$pub=new Publicacion();
$metaC=new Metas();
$validar=new Validaciones();

$eleccion_ut = $_POST['eleccion_ut'];
$imagen_array = array(
    "nombre_temporal" => '',
    "nombre" => '',
    'tipo' => '',
    'error' => '',
    'ruta' => ''
);

if (isset($_FILES['prueba']) && $_FILES['prueba']['type']!='') {

    $imagen_array['ruta_temporal'] = $_FILES['prueba']['tmp_name'];
    $imagen_array['nombre'] = $_FILES['prueba']['name'];
    $imagen_array['tipo'] = $_FILES['prueba']['type'];
    $imagen_array['error'] = $_FILES['prueba']['error'];
    $carpeta_persistente = '../../../imagenes-subidas/';
    if ($imagen_array['error'] == UPLOAD_ERR_OK) {
        $ruta = $carpeta_persistente . basename($imagen_array['nombre']);
        
        $imagen_array['ruta'] = $ruta;
        if (move_uploaded_file($imagen_array['ruta_temporal'], $ruta)) {
            $_SESSION['exito'] = 'La prueba se ha subido con éxito';
            echo 'exito';
        } else {
            $_SESSION['error']['uploaded'] = 'No se ha podido guardar permanentemente la prueba';
            echo 'error';
        };
    } else {
        $_SESSION['error']['carga'] = 'No se ha podido guardar la prueba';
        echo 'error carga';
    };
};

$imagen = json_encode($imagen_array);
unset($_FILES['prueba']);

if ($eleccion_ut == 'usuario') {


    $comentario_u = $validar->validacionAlfanumerico($_POST['comentario_usuario']);

    $meta = empty($_POST['meta']) ? '' :$validar->validacionAlfanumerico($_POST['meta']);
    
   
    $meta = empty($meta) ? 0 : $metaC->verMetasId($meta);
   
    $puntuacion = (int)$validar->validacionNumero($_POST['puntuacion']);
    $titulo=$validar->validacionAlfanumerico($_POST['titulo']);

    $pub->insertarPublicacionUsuario($_SESSION['usuario']['nick'], $titulo,$comentario_u, $puntuacion, $imagen_array['ruta'], $imagen, $meta);
    header('Location:../../index.php?publicacion=ok');

} else {
    $comentario_t = $validar->validacionAlfanumerico($_POST['comentario_testigo']);
    $puntuacion = (int)$validar->validacionNumero($_POST['puntuacion']);
    $titulo=$validar->validacionAlfanumerico($_POST['titulo']);
    $pub->insertarPublicacionTestigo($_SESSION['usuario']['nick'], $titulo,$comentario_t, $puntuacion, $imagen_array['ruta'],$imagen,);
    header('Location:../../index.php?publicacion=ok');
};

