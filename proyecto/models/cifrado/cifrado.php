<?php 

if(isset($_POST['nick'])){
    require_once '../../models/conexion/conexion.php';
}else{
    require_once 'models/conexion/conexion.php';
   
};

class Cifrar{

    public function cifrarPassword($password){
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $password;
    }
    
    public function descifrarLoginPassword($password,$nombre_usuario){
        global $db;
        $consulta_select="SELECT password FROM usuarios WHERE nick='$nombre_usuario'";
        $resultado = mysqli_query($db, $consulta_select);
        $password_hash =mysqli_fetch_assoc($resultado);
        if(password_verify($password, $password_hash['password'])){
            return true;
        }else{
            return false;
        }
    }


}

