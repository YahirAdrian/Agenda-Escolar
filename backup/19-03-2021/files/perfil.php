<?php session_start(); error_reporting(0);?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil</title>
        <link rel="stylesheet" href="css/perfil.css"/>
        <link rel="shortcut icon" href="src/icons/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="src/icons/pwa_icons/icon_96.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="#3F51B5">
        <meta name="theme-color" content="#3F51B5">
        <style>
            .mensaje{
                text-align: center;
            }

            .mensaje img{
                width: 400px;
                height: 400px;
            }

            .texto-mensaje{
                font-family: 'Nunito', sans-serif;
                font-size: 20px;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <?php
            require('php/abrir_conexion.php');

            // error_reporting(0);
            $usuario_id = $_SESSION["usuario"];
    
            if($usuario_id == null || $usuario_id == ''){ //Verificar si ha iniciado sesion
                echo "
                <div class='mensaje'>
                    <img src='src/icons/cerrar.png' alt='error'/>
                    <p class='texto-mensaje'> Primero debes iniciar sesión </p>
                </div>
                ";
    
                echo "<script> setTimeout(()=> window.location = 'index.php', 2000);</script>";
                //de lo contrario, lo redirecciona al login
    
                die();
            }
            //Obtener los datos del usuario
            $consulta = "SELECT * FROM usuarios WHERE id = '$usuario_id';";
            
            $resultado = mysqli_query($conexion, $consulta);
    
            if($resultado){
                $fila = mysqli_fetch_row($resultado);
    
                $id = $fila[0];
                $nombres = $fila[1];
                $apellidos = $fila[2];
                $pass = $fila[3];
                $foto = $fila[4];
                $datos = $fila[5];
            }
    
            $conexion->close();
        ?>
        <header>
                <div class="logo">
                    <a href="inicio.php"><img src="src/calendario.png" alt="icono"/></a>
                    <h1> Perfil - <?php echo $nombres . " " . $apellidos;?></h1>
                </div>

                <div class="menu-final">
                    <div class="caja-icono" style="display:none">
                    <a href="foro.php"><img src="src/charla.png" alt="foro"/></a>
                    </div>
                </div>
                
        </header>

        <section>
            <form action="#" method="POST" class="foto">
                <div class="caja-icono" id="icono-usuario">
                    <?php 
                        echo "<a href='perfil.php' id='foto' style='background: $foto ;'>"
                    ?>
                    <span id="nombre" style="font-size: 35px">Ya</span>
                        <!-- <img src="src/usuario.png" alt="usuario" id="imagen-usuario"/> -->
                    </a>
                </div>
                <p id="editar" style="display:none">Cambiar foto</p>
                <input type="file" name="archivo" id="archivo" style="display:none">
            </form>

            <div class="info">
                <p class="info-dato">Nombre : <span id="nombre-usuario"><?php echo $nombres ?></span></p>
                <p class="info-dato">Apelldos : <span><?php echo $apellidos ?></span></p>
                <p class="info-dato">Grupo : <span>6AMPR</span></p>
                <a href="php/cerrar_sesion.php" id="cerrar_sesion"><button>Cerrar Sesion</button></a>
            </div>
        </section>

        <script>
            //ELEMENTOS DEL PERFIL
            const foto = document.querySelector('#foto');
            const spanLetraPerfil = document.querySelector('#nombre');
            const nombres = document.querySelector('#nombre-usuario');
            spanLetraPerfil.textContent = nombres.textContent.charAt(0).toUpperCase();
        </script>
    </body>
</html>