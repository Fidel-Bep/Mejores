<?php 

function filtrarMetas($orden='DESC'){
    global $db;
    
        $consulta_select="SELECT m.nombre_meta, m.descripcion, m.id , sum(mu.id_meta) as usuarios FROM metas m
        INNER JOIN metas_usuario mu ON m.id=mu.id_meta
        GROUP BY m.nombre_meta
        ORDER BY usuarios $orden";
        
        $resultado = mysqli_query($db, $consulta_select);
        return $resultado;
    
    
};

function filtrarPublicaciones($nick_usuario="",$nick_testigo="",$titulo="",$dificultad="",$duda='',$offset=0){
    global $db;
    $array=array(
        'nick_usuario'=>$nick_usuario,
        'nick_testigo'=>$nick_testigo,
        'titulo'=>$titulo,
        'dificultad'=>$dificultad,
        'duda'=>$duda
    );

    $cadena="WHERE ";

    foreach($array as $key=>$value){
        if($value!=''){
            $cadena.="$key='$value' AND ";
        };
        
    };

    
    if($cadena == "WHERE "){
        if($offset==0){
            $consulta_select="SELECT * FROM  publicaciones LIMIT 10";
            $resultado=mysqli_query($db,$consulta_select);
            return $resultado;
        }else{
            $consulta_select="SELECT * FROM  publicaciones LIMIT 10 OFFSET $offset";
            $resultado=mysqli_query($db,$consulta_select);
            return $resultado;
        }
        
    }else{
        $cadena=substr($cadena,0,strlen($cadena)-5);
        if($offset==0){
            $consulta_select="SELECT * FROM  publicaciones $cadena LIMIT 10";
            $resultado=mysqli_query($db,$consulta_select);
            return $resultado;
        }else{
            $consulta_select="SELECT * FROM  publicaciones  $cadena LIMIT 10 OFFSET $offset";
            echo $cadena;
            $resultado=mysqli_query($db,$consulta_select);
            return $resultado;
        };
    };
    
};

function todosNombreUsuarioPublicaciones(){
    global $db;
    $consulta_select="SELECT nick_usuario FROM publicaciones";
    $resultado=mysqli_query($db,$consulta_select);
    return $resultado;

}

function todosNombreTestigoPublicaciones(){
    global $db;
    $consulta_select="SELECT nick_testigo FROM publicaciones";
    $resultado=mysqli_query($db,$consulta_select);
    return $resultado;

}

function tituloPublicaciones(){
    global $db;
    $consulta_select="SELECT DISTINCT titulo FROM publicaciones";
    $resultado=mysqli_query($db,$consulta_select);
    return $resultado;
}
function contarRegistros($tabla){
    global $db;
    $consulta_select="SELECT COUNT(*) as num_registros FROM $tabla";
    $result=mysqli_query($db,$consulta_select);
    return mysqli_fetch_assoc($result)['num_registros'];
}