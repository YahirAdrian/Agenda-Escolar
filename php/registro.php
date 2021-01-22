<style>
    @import url('../css/mensajes.css');
</style>

<?php
    require('abrir_conexion.php');

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $pass_formulario = $_POST['password1'];

    $sql = "INSERT INTO usuarios (id, nombres, apellidos, pass, foto, datos) VALUES (NULL, '$nombres', '$apellidos', '$pass_formulario', '', '');";
    if (mysqli_query($conexion, $sql)) {
        /*Si se hace la inserccion correctamente, se redirige al loging*/
        echo "
            <div class='mensaje'>
                <img src='../src/icons/cheque.png' alt='check'/>
                <p class='texto-mensaje'> Registro exitoso </p>
            </div>
        ";
        echo "<script> setTimeout(()=> window.location = '../index.html', 2000);</script>";
    }else{
        echo "
            <div class='mensaje'>
                <img src='../src/icons/cerrar.png' alt='error'/>
                <p class='texto-mensaje'> ¡Ocurrió un error! </p>
            </div>
        ";
    }
    $conexion -> close();

?>