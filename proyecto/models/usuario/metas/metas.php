<?php

/*if((isset($_GET['meta']) && intval($_GET['meta'])!=0) || !isset($_GET['meta'])){
    
    require_once '../../../models/comprobaciones/comprobaciones.php';
}else{
    */
    if(file_exists('models/comprobaciones/comprobaciones.php')){
        require_once 'models/comprobaciones/comprobaciones.php';
    }elseif(file_exists('../../../models/comprobaciones/comprobaciones.php')){
        require_once '../../../models/comprobaciones/comprobaciones.php';
    }else{
        require_once '../../models/comprobaciones/comprobaciones.php';
    }
   

   

class Metas{
    function verMetas(){
        global $db;
        $consulta_select="SELECT * FROM metas ";
        $resultado = mysqli_query($db, $consulta_select);
        
        return $resultado;
    }
    
    function verMisMetas($nick){
        global $db;
        $consulta_select="SELECT m.nombre_meta, m.descripcion, m.id, mu.fecha_creacion, mu.puntuacion_meta FROM metas m
        INNER JOIN metas_usuario mu ON m.id=mu.id_meta
        WHERE mu.nick_usuario='$nick'";
        $resultado = mysqli_query($db, $consulta_select);
        return $resultado;
    }
    
    function verMetasId($nombre_meta){
        global $db;
        $comprobar=new Comprobaciones();
        if($comprobar->comprobarMetaExiste($nombre_meta)){
            $consulta_select="SELECT id FROM metas WHERE nombre_meta='$nombre_meta'";
            $resultado=mysqli_query($db,$consulta_select);
            $result=mysqli_fetch_assoc($resultado);
    
            return $result['id'];
        }else{
            
        }
        
    }
    function verMetasNombre($id){
        global $db;
        
            $consulta_select="SELECT nombre_meta FROM metas WHERE id=$id";
            $resultado=mysqli_query($db,$consulta_select);
            $result=mysqli_fetch_assoc($resultado);
    
            return $result['nombre_meta'];
       
        
    }
    
    function borrarMetaUsuario($nick,$meta){
        global $db;
        $consulta_delete="DELETE FROM metas_usuario WHERE nick_usuario='$nick' AND id_meta='$meta'";
        $resultado = mysqli_query($db, $consulta_delete);
        return $resultado;
    }
    
    function insertarMeta($meta,$descripcion='')
    {
        global $db;
        $consulta_insert = "INSERT INTO metas (nombre_meta,descripcion) VALUES ('$meta','$descripcion')";
        $resultado = mysqli_query($db, $consulta_insert);
        return $resultado;
    }
    
    function insertarMetaUsuario($nick, $meta)
    {
        global $db;
        $consulta_insert = "INSERT INTO metas_usuario (nick_usuario, id_meta) 
        SELECT '$nick',id
        FROM metas
        WHERE nombre_meta='$meta'";
        $resultado = mysqli_query($db, $consulta_insert);
        return $resultado;
    }
}



