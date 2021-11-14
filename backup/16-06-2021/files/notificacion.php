<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ver notificacion</title>
        <link rel="stylesheet" href="css/foro.css">
        <link rel="shortcut icon" href="src/icons/favicon.ico" type="image/x-icon">
        <link rel="icon" type="image/png" href="src/icons/opera_icon.png">
        <link rel="apple-touch-icon" href="src/icons/pwa_icons/icon_96.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="#3F51B5">
        <meta name="theme-color" content="#3F51B5">
    </head>
    
    <body>
        <?php
            $id = $_GET['id'];
            $titulo;
            $descripcion;
            require('php/abrir_conexion.php');
            $consulta = "SELECT id,de, titulo,descripcion FROM notificaciones WHERE id = '$id';";
        
            $resultado = $conexion->query($consulta);
            $numFilas = $resultado->num_rows;
    
            if($resultado){
                for ($i=0; $i <$numFilas ; $i++) { 
                    $fila = $resultado->fetch_Object();
                    $titulo = $fila->titulo;
                    $descripcion = $fila->descripcion;
                }
    
            }
            $resultado->free();
            $conexion->close();
        ?>
        <header>
                    <div class="logo">
                        <a href="inicio.php"><img src="src/calendario.png" alt="icono"/></a>
                        <h1><?php echo $titulo ?></h1>
                    </div>

                    <div class="menu-final">
                        <div class="caja-icono" style="display:none">
                            <img src="src/notificacion.png" alt="notificaciones"/>
                            <span id="numero-notificaciones">.n.</span>
                        </div>

                        <!--<div class="caja-icono">
                        <a href="foro.php"><img src="src/charla.png" alt="foro"/></a>
                        </div>-->

                        <!--<div class="caja-icono" id="icono-usuario">
                            <a href="perfil.php"><img src="src/usuario.png" alt="usuario" id="imagen-usuario"/></a>
                            <span id="nombre-usuario">Yahir Adrian</span>
                        </div>-->
                    </div>
                    
            </header>
            
            <section style="background-color: #fff; width: 90%; margin:30px auto; padding: 10px; border-radius: 4px">
                <?php
                    echo $descripcion;
                ?>
            </section>
    </body>
</html>