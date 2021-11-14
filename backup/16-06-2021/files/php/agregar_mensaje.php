<?php
    session_start();
    if(isset($_SESSION['usuario']) && isset($_POST['mensaje']) ){
        require('abrir_conexion.php');
        $id_usuario = $_SESSION['usuario'];
        $mensaje = $_POST['mensaje'];
        //Verificar si tiene menos de 2 posts
        $resultado_numero_posts = $conexion->query("SELECT COUNT(id_usuario) FROM mensajes WHERE id_usuario = $id_usuario");
        $numero_post = $resultado_numero_posts->fetch_array();
        if(intval($numero_post[0]) < 2){
            $consulta = "INSERT INTO mensajes (id, id_usuario, mensaje, fecha, hora) VALUES (NULL, $id_usuario, '$mensaje', CURRENT_DATE(), CURRENT_TIME())";
            
            if($conexion->query($consulta)){
                header('location: ../despedida.php');
                
            }else{
                echo "<h1>Tu mensaje no pudo ser agregado</h1>
                    <p>Puede ser debido a que usaste caracteres no soportados como por ejemplo: emoticones. Intenta escribir el mensaje de nuevo sin caracteres especiales</p> <h2>Tu mensaje</h2><br> $mensaje";
                echo "Copia y pega tu mensaje e intenta agregarlo de nuevo";
                echo"<a href='../despedida.php'>Regresar</a>";
            }
            // print $consulta;
            
        }else{
            echo "<h1 style='text-align: center'> Ya no puedes publicar mas mensajes porque has excedido el limite de mensajes (2 mensajes)</h1><a href='../despedida.php'>Regresar</a>";
        }
    }else{
        header('location: ../index.php');
    }
?>