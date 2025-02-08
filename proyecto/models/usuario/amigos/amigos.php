<?php
class Amigos{
    public function verAmigos($nick){
        global $db;
        $consulta_select="SELECT nick_usuario,nick_amigo,solicitud_amistad FROM amigos WHERE nick_usuario='$nick' 
        OR nick_amigo='$nick'";
        $resultado = mysqli_query($db, $consulta_select);    
        return $resultado;
    }

    public function comprobarAmistadExisteSim($amigo, $nick){
        global $db;
        $consulta_select="SELECT * FROM amigos WHERE nick_usuario='$amigo' AND nick_amigo='$nick'";
        $resultado = mysqli_query($db, $consulta_select);
        
        if(mysqli_num_rows($resultado)!=0){
            return true;
        }else{
            return false;
        }
    }

    public function comprobarAmistadExiste($nick, $amigo){
        global $db;
        $consulta_select="SELECT * FROM amigos WHERE nick_usuario='$nick' AND nick_amigo='$amigo'";
        $resultado = mysqli_query($db, $consulta_select);
        
        if(mysqli_num_rows($resultado)!=0){
            return true;
        }elseif($this->comprobarAmistadExisteSim($amigo, $nick)){
            return true;
        }
        else{
            return false;
        }
    }

    public function verSolicitudesAmistadPendientes($nick){
        global $db;
        $consulta_select="SELECT nick_usuario FROM amigos WHERE nick_amigo='$nick' AND solicitud_amistad='pendiente'";
        $resultado = mysqli_query($db, $consulta_select);
        
        return $resultado;
    }

    public function borrarAmigoSim($amigo,$nick){
        global $db;
        $consulta_delete="DELETE FROM amigos WHERE nick_usuario='$amigo' AND nick_amigo='$nick'";
        $resultado = mysqli_query($db, $consulta_delete);
        if($resultado){
            return true;
        }
    
    }

    public function borrarAmigo($nick,$amigo){
        global $db;
        $consulta_delete="DELETE FROM amigos WHERE nick_usuario='$nick' AND nick_amigo='$amigo'";
        mysqli_query($db, $consulta_delete);
        if(mysqli_affected_rows($db)!=0){
            return true;
        }else{
            if($this->borrarAmigoSim($amigo,$nick)){
                return true;
            }
        }
        
    }

    public function insertarAmigo($nick, $amigo)
    {
        global $db;
        $consulta_insert = "INSERT INTO amigos (nick_usuario, nick_amigo, solicitud_amistad) 
        VALUES ('$nick', '$amigo', 'pendiente')";
        $resultado = mysqli_query($db, $consulta_insert);
        if ($resultado) {
            $_SESSION['exito'] = "Solicitud de amistad enviada";
        } else {
            $_SESSION['error'] = "Solicitud de amistad fallida";
        }
    }

    function resolverSolicitudAmistad($nick_amigo,$resolucion){
        global $db;
        $nick_amigo=$_SESSION['usuario']['nick'];
        $consulta_update="UPDATE amigos SET solicitud_amistad='$resolucion' WHERE nick_amigo='$nick_amigo'";
        $resultado=mysqli_query($db, $consulta_update);
    
        return $resultado;
        
    } 

   

}

    
    
    
    
   
    
    
    
   
    
    
    
    
    
    
    


















