<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $database = "agenda_escolar";

    $conexion = new mysqli($servername, $username, $password, $database);
            
    if($conexion->connect_error){
        die('Error de Conexion ('.$database->connect_error.')'.$database->connect_error);
    }
?>