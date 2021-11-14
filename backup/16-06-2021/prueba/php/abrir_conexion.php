<?php
    $servername = "localhost";
    $database = "agenda_escolar";
    $username = "root";
    $password = "root";

    $conexion = new mysqli($servername, $username, $password, $database);
    $conexion->set_charset("utf8");
            
    if($conexion->connect_error){
        die('Error de Conexion ('.$database->connect_error.')'.$database->connect_error);
    }
?>