<?php

class Comentario{
    function verComentarios($id){
        global $db;
        $consulta_select="SELECT * FROM comentarios WHERE id_publicacion=$id";
        $resultado=mysqli_query($db,$consulta_select);
    
        return $resultado;
    
    
        
    }
    
    function agregarComentario($id_publicacion,$nick_comentador,$duda,$testigo,$usuario,$comentario){
        global $db;
    
        
    
            
            $consulta_insert="INSERT INTO comentarios (id_publicacion, nick_comentador,comentario) 
            VALUES ($id_publicacion, '$nick_comentador','$comentario')";
            echo $consulta_insert;
            $resultado=mysqli_query($db,$consulta_insert);
            $id=mysqli_insert_id($db);
            $cadena='';
            $vacio=true;
            if($resultado){
                $array=array(
                    "duda" => $duda,
                    "testigo"=>$testigo,
                    "usuario"=>$usuario
        
                );
        
                foreach($array as $key=>$value){
                    if($value!='no'){
                        $cadena.="$key='$value'".", ";
                        
                        $vacio=false;             
        
                    }
        
                }
                if($vacio===false){
                    $cadena=substr($cadena,0,strlen($cadena)-2);
                    
                    $consulta_update="UPDATE comentarios SET $cadena WHERE id=$id";
                    $result_update=mysqli_query($db,$consulta_update);
                    
                    return $result_update;
                }
                
    
    
        }else{
            return "Error al insertar los datos";
        }
    }
       
}
