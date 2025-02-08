<?php

if (isset($_POST['nick'])) {
    require_once '../../models/conexion/conexion.php';
    require_once '../../models/comprobaciones/comprobaciones.php';
} else {
    require_once 'models/conexion/conexion.php';
    require_once 'models/comprobaciones/comprobaciones.php';
};


class Usuario
{


    public function login($nick, $password)
    {

        $comprobar = new Comprobaciones;
        global $db;
        if ($comprobar->comprobarNickExiste($nick)) {

            $consulta_select = "SELECT * FROM usuarios WHERE nick='$nick'";
            $resultado = mysqli_query($db, $consulta_select);
            $usuario = mysqli_fetch_assoc($resultado);
            if (password_verify($password, $usuario['password'])) {
                $_SESSION['usuario'] = $usuario;
            } else {
                $_SESSION['password_error'] = "Contraseña es incorrecta";
                header('Location: ../index.php');
            };
        } else {
            $_SESSION['nick_error'] = "Usuario es incorrecto";
            header('Location: ../index.php');
        }
    }

    public function registro($nick, $nombre, $apellidos, $email, $provincia, $municipio, $codigo_postal, $password, $principios = "", $objetivo_moral = "", $lema = "")
    {
        global $db;
        $cadena = "";
        $array = array(

            'principios' => $principios,
            'objetivo_moral' => $objetivo_moral,
            'lema' => $lema
        );

        $consulta_insert = "INSERT INTO usuarios (nick, nombre, apellidos, email, provincia, municipio, codigo_postal, password) 
    VALUES ('$nick', '$nombre', '$apellidos', '$email', '$provincia', '$municipio', '$codigo_postal', '$password')";
        $resultado = mysqli_query($db, $consulta_insert);


        if ($resultado) {

            foreach ($array as $key => $value) {
                if ($value != "") {
                    $cadena .= "$key='$value', ";
                }
            }
            $cadena = substr($cadena, 0, -2);
            $consulta_update = "UPDATE usuarios SET $cadena WHERE nick='$nick'";
            $resultado = mysqli_query($db, $consulta_update);
            if ($resultado) {
                $_SESSION['exito'] = "Registro exitoso";
            } else {
                $_SESSION['error_registro_actualizar'] = "Registro fallido al actualizar";
            }
        } else {
            $_SESSION['error_registro_insertar'] = "Registro fallido al insertar";
        }
    }

    public function actualizarDatos($nick, $nombre, $apellidos, $email, $provincia, $municipio, $codigo_postal, $password,$principios = "", $objetivo_moral = "", $lema = "")
    {
        global $db;
        
        $cadena = "";
        $nick_nuevo= $nick != "" ? $nick_nuevo = $nick : $nick_nuevo=$_SESSION['usuario']['nick'];
        $nick_actual = $_SESSION['usuario']['nick'];

        $array = array(
            'nick' => $nick,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email,
            'provincia' => $provincia,
            'municipio' => $municipio,
            'codigo_postal' => $codigo_postal,
            'principios' => $principios,
            'objetivo_moral' => $objetivo_moral,
            'lema' => $lema,
            'password' => $password
        );


        foreach ($array as $key => $value) {
            if ($value != "") {
                $cadena .= "$key='$value', ";
            }
        };
        
        $cadena = substr($cadena, 0, -2);
        echo $cadena;
        $consulta_update = "UPDATE usuarios SET $cadena WHERE nick='$nick_actual'";
        $resultado = mysqli_query($db, $consulta_update);
        if ($resultado) {
            $_SESSION['exito']= "Actualización exitosa";
            $_SESSION['usuario']['nick'] = $nick_nuevo;
            echo "Hola usuario nick nuevo";

            
        } else {
            $_SESSION['error_registro_actualizar'] = "Registro fallido al actualizar";
            echo "Hola usuario error registro";
            
        }
    }
}
