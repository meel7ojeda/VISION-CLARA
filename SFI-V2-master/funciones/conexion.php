<?php

function ConexionBD($Host = 'localhost' ,  $User = 'root',  $Password = '', $BaseDeDatos='opticavision' ) {

    $linkConexion = mysqli_connect($Host, $User, $Password, $BaseDeDatos);
    if ($linkConexion!=false) 
    {
        return $linkConexion;
    }
    else {
        die ('No se pudo establecer la conexión.');
    }
    }

//Conexion en una variable global
$conexion = ConexionBD();
?>