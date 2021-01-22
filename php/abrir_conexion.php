<?php
    $servername = "localhost";
    $database = "agenda_escolar";
    $username = "root";
    $password = "";

    $conexion = new mysqli($servername, $username, $password, $database);
            
    if($conexion->connect_error){
        die('Error de Conexion ('.$database->connect_error.')'.$database->connect_error);
    }
?>