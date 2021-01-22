<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil</title>
        <link rel="stylesheet" href="css/perfil.css"/>
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
            session_start();
            // error_reporting(0);
            $usuario_id = $_SESSION["usuario"];
    
            if($usuario_id == null || $usuario_id == ''){ //Verificar si ha iniciado sesion
                echo "
                <div class='mensaje'>
                    <img src='src/icons/cerrar.png' alt='error'/>
                    <p class='texto-mensaje'> Primero debes iniciar sesión </p>
                </div>
                ";
    
                echo "<script> setTimeout(()=> window.location = 'index.html', 4000);</script>";
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
                    <img src="src/calendario.png" alt="icono"/>
                    <h1> Perfil - <?php echo $nombres . " " . $apellidos;?></h1>
                </div>

                <div class="menu-final">
                    <div class="caja-icono">
                        <img src="src/notificacion.png" alt="notificaciones"/>
                        <span id="numero-notificaciones">.n.</span>
                    </div>

                    <div class="caja-icono">
                    <a href="foro.php"><img src="src/charla.png" alt="foro"/></a>
                    </div>

                    <div class="caja-icono" id="icono-usuario">
                        <a href="perfil.php"><img src="src/usuario.png" alt="usuario" id="imagen-usuario"/></a>
                        <span id="nombre-usuario">Yahir Adrian</span>
                    </div>
                </div>
                
        </header>

        <section>
            <form action="#" method="POST" class="foto">
                <?php
                    if($foto == ''){
                        //Colocamos las iniciales de su nombre
                        echo "<img src='src/usuario.png' alt='foto perfil'/>";
                    }else{
                        //Colocamos su foto de perfil
                        echo "<img src='src/usuario.png' alt='foto perfil'/>";
                    }
                ?>
                <p id="editar">Cambiar foto</p>
                <input type="file" name="archivo" id="archivo">
            </form>

            <div class="info">
                <p class="info-dato">Nombre : <span><?php echo $nombres ?></span></p>
                <p class="info-dato">Apelldos : <span><?php echo $apellidos ?></span></p>
                <p class="info-dato">Grupo : <span>6AMPR</span></p>
                <a href="php/cerrar_sesion.php" id="cerrar_sesion"><button>Cerrar Sesion</button></a>
            </div>
        </section>
    </body>
</html>