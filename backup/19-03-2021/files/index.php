<?php 
    session_start();
    if(isset($_COOKIE["uid"])){
        $_SESSION["usuario"] = $_COOKIE["uid"];
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agenda Escolar</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/responsive/index.css">
        <link rel="icon" type="image/png" href="src/icons/opera_icon.png">
        <link rel="manifest" href="manifest.json"/>
        <link rel="shortcut icon" href="src/icons/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="src/icons/pwa_icons/icon_96.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="#3F51B5">
        <meta name="theme-color" content="#3F51B5">
    </head>

    <body>
        <?php
        
        if(isset($_SESSION["usuario"])){
            if($_SESSION["usuario"] == "admin"){
                echo "<script> window.location='admin.php';</script>";
                //Si ha iniciado sesion, lo enviamos al incio
                die();
            }

            require('php/abrir_conexion.php');
            $usuario_id = $_SESSION["usuario"];
    
            if($usuario_id != null || $usuario_id != ''){ //Verificar si ha iniciado sesion
    
                echo "<script> window.location='inicio.php';</script>";
                //Si ha iniciado sesion, lo enviamos al incio
                die();
            }
        }
        
        ?>
        <header>
            <div class="logo">
                <img src="src/calendario.png" alt="icono"/>
                <h1>Agenda Escolar</h1>
            </div>

            <div class="caja-registro">
                <a href="registro.html">Registrarse</a>
            </div>
        </header>

        <section>
            <div class="caja-sesion">
                <img src="src/usuario.png" width="60"/>
                <form action="php/sesion.php" method="POST">
                    <h2>Iniciar sesión en Agenda 6AMPR</h2>
                    <div class="usuario">
                        <p><span class="titulo-campo">Nombre:</span></p>
                        <input type="text" name="nombre" id="user-field"/>
                    </div>

                    <div class="password">
                        <p><span class="titulo-campo">Contraseña:</span></p>
                        <input type="password" name="password" id="password-field"/>
                    </div>
                    
                    <div class="check">
                        <input type="checkbox" name="renember" id="checkbox-field" style="width: 30px"/>
                        <p style="display: inline"><span class="titulo-campo">Mantener sesión iniciada</span></p>
                    </div>

                    <button type="submit" id="submit">Iniciar sesión</button>
                </form>
            </div>
       </section>

        <footer>
            
        </footer> 

        <script src="js/formularios.js"></script>
        <script src="app.js"></script>
    </body>
</html>