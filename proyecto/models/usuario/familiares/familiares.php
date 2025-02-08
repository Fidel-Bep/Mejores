<?php

class Familiar{
    function verFamiliares($nick){
        global $db;
        $consulta_select="SELECT nick_usuario,nick_familiar,solicitud_familia FROM familiares WHERE nick_usuario='$nick' 
        OR nick_familiar='$nick'";
        $resultado = mysqli_query($db, $consulta_select);    
        return $resultado;
    }
    
    
    
    function comprobarFamiliaExisteSim($familiar, $nick){
        global $db;
        $consulta_select="SELECT * FROM familiares WHERE nick_usuario='$familiar' AND nick_familiar='$nick'";
        $resultado = mysqli_query($db, $consulta_select);
        
        if(mysqli_num_rows($resultado)!=0){
            return true;
        }else{
            return false;
        }
    }
    
    function comprobarFamiliaExiste($nick, $familiar){
        global $db;
        $consulta_select="SELECT * FROM familiares WHERE nick_usuario='$nick' AND nick_familiar='$familiar'";
        $resultado = mysqli_query($db, $consulta_select);
        
        if(mysqli_num_rows($resultado)!=0){
            return true;
        }elseif($this->comprobarFamiliaExisteSim($familiar, $nick)){
            return true;
        }
        else{
            return false;
        }
    }
    
    function verSolicitudesFamiliaPendientes($nick){
        global $db;
        $consulta_select="SELECT nick_usuario FROM familiares WHERE nick_familiar='$nick' AND solicitud_familia='pendiente'";
        $resultado = mysqli_query($db, $consulta_select);
        
        return $resultado;
    }
    
    function borrarFamiliarSim($familiar,$nick){
        global $db;
        $consulta_delete="DELETE FROM familiares WHERE nick_usuario='$familiar' AND nick_familiar='$nick'";
        $resultado=mysqli_query($db, $consulta_delete);
        return $resultado;
        
        
    
    }
    
    function borrarFamiliar($nick,$familiar){
        global $db;
        
        $consulta_delete="DELETE FROM familiares WHERE nick_usuario='$nick' AND nick_familiar='$familiar'";
        mysqli_query($db, $consulta_delete);
        if(mysqli_affected_rows($db)!=0){
            return true;
    
        }elseif ($this->borrarFamiliarSim($familiar,$nick)){
           return true;
        }
        
    
    }
    
    function insertarFamiliar($nick, $familiar)
    {
        global $db;
        $consulta_insert = "INSERT INTO familiares (nick_usuario, nick_familiar, solicitud_familia) 
        VALUES ('$nick', '$familiar', 'pendiente')";
        $resultado = mysqli_query($db, $consulta_insert);
        if ($resultado) {
            $_SESSION['exito'] = "Solicitud de familia enviada";
        } else {
            $_SESSION['error'] = "Solicitud de familia fallida";
        }
    }
    function resolverSolicitudFamilia($nick_familiar,$resolucion){
        global $db;
        $nick_familiar=$_SESSION['usuario']['nick'];
        $consulta_update="UPDATE familiares SET solicitud_familia='$resolucion' WHERE nick_familiar='$nick_familiar'";
        $resultado=mysqli_query($db, $consulta_update);
    
        return $resultado;
        
    }
}
