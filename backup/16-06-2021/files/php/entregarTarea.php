<?php
    session_start();
    require('abrir_conexion.php');
    $id_tarea = $_POST["id_tarea"];
    $id_usuario = $_SESSION["usuario"];
    $consulta = "INSERT INTO `tareacompletada_usuario` (id, id_tarea, id_usuario, fecha, hora) VALUES (NULL, '$id_tarea', '$id_usuario', CURRENT_DATE(), CURRENT_TIME())";
    $conexion->query($consulta);
    $conexion->close();
    
    echo "<script>
    caches.delete('app-dynamic-v1').then(res=>console.log('exito'));
    window.location = '../inicio.php';
    </script>";
?>