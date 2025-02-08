<?php
class Publicacion{
    function verPublicaciones(){
        global $db;
        $consulta_select="SELECT * FROM publicaciones ORDER BY fecha_creacion DESC";
        $result=mysqli_query($db,$consulta_select);
        return $result;
    }
    function verMisPublicaciones($nick){
        global $db;
        $consulta_select="SELECT * FROM publicaciones WHERE nick_usuario='$nick' OR nick_testigo='$nick' ORDER BY fecha_creacion DESC";
        $resultado=mysqli_query($db, $consulta_select);
        
            return $resultado;
        
    }
    
    function verMisPublicacionesPorId($id){
        global $db;
        $consulta_select="SELECT * FROM publicaciones WHERE id=$id";
        $resultado=mysqli_query($db, $consulta_select);
        
            return $resultado;
        
    }
    
    function verPruebasDePublicacion($id){
        global $db;
        $consulta_select="SELECT * FROM pruebas WHERE id_publicacion=$id";
        $resultado=mysqli_query($db, $consulta_select);
        
            return $resultado;
        
    }
    
    function insertarPublicacionTestigo($testigo, $titulo, $comentario_t, $puntuacion, $prueba, $json)
    {
        global $db;
        if (empty($prueba)) {
            $consulta_insert = "INSERT INTO publicaciones (nick_testigo,titulo,comentario_testigo,puntuacion) 
            VALUES ('$testigo','$titulo','$comentario_t',$puntuacion)";
            $result = mysqli_query($db, $consulta_insert);
            return $result;
        } else {
            try {
                mysqli_begin_transaction($db);
                $consulta_insert_publicaciones = "INSERT INTO publicaciones (nick_testigo,titulo,comentario_testigo,puntuacion) 
                VALUES ('$testigo','$titulo','$comentario_t',$puntuacion)";
                mysqli_query($db, $consulta_insert_publicaciones);
                $id = mysqli_insert_id($db);
                $consulta_insert_pruebas = "INSERT INTO pruebas (id_publicacion,nick_aportador,prueba,metadatos)
                VALUES ($id,'$testigo','$prueba','$json')";
                mysqli_query($db, $consulta_insert_pruebas);
                mysqli_commit($db);
                return 'datos insertados con éxito';
            } catch (Exception $e) {
                mysqli_rollback($db);
                return 'error al insertar los datos';
            }
        }
    }
    
    function insertarPublicacionUsuario($usuario, $titulo, $comentario_u, $puntuacion, $prueba, $json, $id_meta)
    {
        global $db;
        if ($id_meta == 0) {
            if (empty($prueba)) {
                $consulta_insert = "INSERT INTO publicaciones (nick_usuario,titulo,comentario_usuario,puntuacion) 
            VALUES ('$usuario','$titulo','$comentario_u',$puntuacion)";
                $result = mysqli_query($db, $consulta_insert);
                return $result;
            } else {
                try {
                    mysqli_begin_transaction($db);
                    $consulta_insert = "INSERT INTO publicaciones (nick_usuario,titulo,comentario_usuario,puntuacion) 
            VALUES ('$usuario','$titulo','$comentario_u',$puntuacion)";
    
                    mysqli_query($db,$consulta_insert);
    
                    $id = mysqli_insert_id($db);
                    echo $id;
                    $consulta_insert_pruebas = "INSERT INTO pruebas (id_publicacion,nick_aportador,prueba,metadatos)
                VALUES ($id,'$usuario','$prueba','$json')";
                    var_dump(mysqli_query($db, $consulta_insert_pruebas));
                    
                    mysqli_commit($db);
                    return 'datos insertados con éxito';
                } catch (Exception $e) {
                    mysqli_rollback($db);
                   
                    return 'los datos no se han insertado';
                }
    
                return $result;
            }
        } else {
            if (empty($prueba)) {
                $consulta_insert = "INSERT INTO publicaciones (nick_usuario,titulo,comentario_usuario,id_meta,puntuacion) 
                VALUES ('$usuario','$titulo','$comentario_u',$id_meta,$puntuacion)";
    
                $result = mysqli_query($db, $consulta_insert);
                return $result;
            } else {
                try {
                    mysqli_begin_transaction($db);
                    $consulta_insert = "INSERT INTO publicaciones (nick_usuario,titulo,comentario_usuario,id_meta,puntuacion) 
                    VALUES ('$usuario','$titulo','$comentario_u',$id_meta,$puntuacion)";
                    mysqli_query($db, $consulta_insert);
                    $id = mysqli_insert_id($db);
    
                    $consulta_insert_pruebas = "INSERT INTO pruebas (id_publicacion,nick_aportador,prueba,metadatos)
                    VALUES ($id,'$usuario','$prueba',$json')";
                    mysqli_query($db, $consulta_insert_pruebas);
    
                    mysqli_commit($db);
                    return 'datos insertados con éxito';
                } catch (Exception $e) {
                    mysqli_rollback($db);
                    return 'fallo al insertar los datos meta';
                }
            }
        }
    }
}
