
<?php 
/*
if(isset($_POST['nick'])){
    require_once '../../models/conexion/conexion.php';
}else{
    require_once 'models/conexion/conexion.php';
   
};*/



class Comprobaciones
{


    public function comprobarNickExiste($nick)
    {
        global $db;
        $consulta_select = "SELECT * FROM usuarios WHERE nick='$nick'";
        $resultado = mysqli_query($db, $consulta_select);
        if (mysqli_num_rows($resultado) != 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function comprobarEmailExiste($email)
    {
        global $db;
        $consulta_select = "SELECT * FROM usuarios WHERE email='$email'";
        $resultado = mysqli_query($db, $consulta_select);
        if (mysqli_num_rows($resultado) != 0) {
            return 1;
        } else {
            return 0;
        }
       
        
    }

    public function comprobarMetaExiste($meta)
    {
        global $db;
        $consulta_select = "SELECT * FROM metas WHERE nombre_meta='$meta'";
        $resultado = mysqli_query($db, $consulta_select);

        if (mysqli_num_rows($resultado) != 0) {
            return true;
        } else {
            return false;
        }
    }
}
