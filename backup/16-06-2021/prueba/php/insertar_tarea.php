<style>
    @import url('../css/mensajes.css');
</style>

<?php
    require('abrir_conexion.php');

    $materia = $_POST['materia'];
    $tarea = $_POST['tarea'];
    $url = $_POST['url'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $consulta = "INSERT INTO tareas (id, materia, nombre, url, fecha_limite, hora_limite) VALUES (NULL, '$materia', '$tarea','$url' ,  '$fecha', '$hora');";
    
    if($conexion->query($consulta)){
        echo "
            <div class='mensaje'>
                <img src='../src/icons/cheque.png' alt='check'/>
                <p class='texto-mensaje'> Se agregó la tarea exitosamente </p>
            </div>
        ";
        echo "<script> setTimeout(()=> window.location = '../admin.php', 1200);</script>";
    }else{
        echo "
            <div class='mensaje'>
                <img src='../src/icons/cerrar.png' alt='error'/>
                <p class='texto-mensaje'> Ocurrió un error </p>
            </div>
        ";

        echo "<script> setTimeout(()=> window.location = '../admin.php', 3000);</script>";
    }
?>