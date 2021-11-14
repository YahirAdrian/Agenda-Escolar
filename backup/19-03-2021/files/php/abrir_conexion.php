<?php
    $servername = "localhost";
    $database = "id15950298_agenda_escolar";
    $username = "id15950298_agenda6";
    $password = "Loremipsumdolorsitamet1;";

    $conexion = new mysqli($servername, $username, $password, $database);
    $conexion->set_charset("utf8");
            
    if($conexion->connect_error){
        die('Error de Conexion ('.$database->connect_error.')'.$database->connect_error);
    }
?>