<style>
    @import url('../css/mensajes.css');
</style>

<?php
    require('abrir_conexion.php');

    $aviso = $_POST['aviso'];
    $consulta = "INSERT INTO notificaciones (id, de, para, descripcion, leido) VALUES (NULL, 'admin', 'todos', '$aviso', '0');";
    
    if($conexion->query($consulta)){
        echo "
            <div class='mensaje'>
                <img src='../src/icons/cheque.png' alt='check'/>
                <p class='texto-mensaje'> Se agregó el aviso exitosamente </p>
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