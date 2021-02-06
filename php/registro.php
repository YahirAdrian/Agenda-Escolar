<style>
    @import url('../css/mensajes.css');
</style>

<?php
    require('abrir_conexion.php');

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $pass_formulario = $_POST['password1'];
    $foto = rand(1, 10);

    switch ($foto) {
        case 1: $foto = '#e11111'; break;
        case 2: $foto = '#ff5a0f'; break;
        case 3: $foto = '#15a762'; break;
        case 4: $foto = '#1d91bc'; break;
        case 5: $foto = '#223472'; break;
        case 6: $foto = '#7b2ce7'; break;
        case 7: $foto = '#810b8b'; break;
        case 8: $foto = '#c64646'; break;
        case 9: $foto = '#2e6a26'; break;
        
        default: $foto = '#59778b';
            break;
    }

    $sql = "INSERT INTO usuarios (id, nombres, apellidos, pass, foto, datos) VALUES (NULL, '$nombres', '$apellidos', '$pass_formulario', '$foto', '');";
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