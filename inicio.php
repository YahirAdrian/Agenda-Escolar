<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        <link rel="stylesheet" href="css/inicio.css">
        <link rel="stylesheet" href="css/responsive/inicio.css">
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
        session_start();
        if($_SESSION["usuario"] == "admin"){
            header('location: admin.php');
        }

        require('php/abrir_conexion.php');
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
                <h1>Agenda Escolar</h1>
            </div>

            <div class="menu-final">
                <div class="caja-icono">
                    <img src="src/notificacion.png" alt="notificaciones" id="icono-notificacion"/>
                    <!-- <div id="numero-notificaciones">
                        <span >.n.</span>
                    </div> -->
                    <div class="caja-notificaciones" style ="display:none">
                    </div>
                </div>

                <div class="caja-icono">
                <a href="foro.php" style="display:none"><img src="src/charla.png" alt="foro"/></a>
                </div>

                <div class="caja-icono" id="icono-usuario">
                    <a href="perfil.php"><img src="src/usuario.png" alt="usuario" id="imagen-usuario"/></a>
                    <span id="nombre-usuario">
                    <?php
                     echo $nombres; 
                     ?></span>
                </div>
            </div>
            
        </header>
        
        <div class="grupo">
            <h2>6AMPR</h2>
        </div>

        <section>
            <div class="tareas">

                <div class="reuniones">
                    <h3 id="primero">Reuniones para dd/mm</h3>
                    <table>
                        <thead>
                            <th>Materia</th>
                            <th>Hora</th>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Materia A</td>
                                <td id="hora">hh:mm - hh:mm</td>
                            </tr>

                            <tr>
                                <td>Materia A</td>
                                <td id="hora">hh:mm - hh:mm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="por-entregar">
                    <h3>Tareas por entregar</h3>
                    <table>
                        <thead>
                            <th>Materia</th>
                            <th>Tareas</th>
                            <th>Fecha de Vencimiento</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Materia A</td>

                                <td class="tareas-lista">
                                        <materia> <input type="checkbox"/>Tarea 1</materia>
                                        <materia> <input type="checkbox"/>Tarea2</materia>
                                </td>
                                <td class="fecha" rowspan="2">
                                        <materia> dd/mm/aaaa a las hh:mm</materia>
                                        <materia> dd/mm/aaaa a las hh:mm</materia>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="entregadas">
                <h3 >Tareas Entregadas</h3>
                    <table>
                        <thead>
                            <td>Materia</td>
                            <td>Tareas</td>
                            <td>Entregado</td>
                        </thead>
                        <tbody>
                        <tr>
                                <td>Materia A</td>

                                <td class="tareas-lista">
                                        <materia> <input type="checkbox"/>Tarea 1</materia>
                                        <materia> <input type="checkbox"/>Tarea2</materia>
                                </td>
                                <td class="fecha" rowspan="2">
                                        <materia> dd/mm/aaaa a las hh:mm</materia>
                                        <materia> dd/mm/aaaa a las hh:mm</materia>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="vencidas">
                <h3>Tareas Vencidas</h3>
                    <table>
                        <thead>
                            <td>Materia</td>
                            <td>Tareas</td>
                            <td>Venció</td>
                        </thead>
                        <tbody>
                        <tr>
                                <td>Materia A</td>

                                <td class="tareas-lista">
                                        <materia> Tarea 1</materia>
                                        <materia> Tarea2</materia>
                                </td>
                                <td class="fecha" rowspan="2">
                                        <materia> dd/mm/aaaa a las hh:mm</materia>
                                        <materia> dd/mm/aaaa a las hh:mm</materia>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="gap"></div>
            <aside>
                <div id="caja-horario">
                    <h3>Horario</h3>
                    <img src="src/Horario.png" alt="horario"/>
                </div>

                <div id="acceso">
                    <h3>Acceso</h3>
                    <a href="#" target="_blank" id="ozelot">Ozelot</a>
                    <a href="#" target="_blank">Materia a</a>
                    <a href="#" target="_blank">Materia b</a>
                    <a href="#" target="_blank">Materia c</a>
                    <a href="#" target="_blank">Materia d</a>
                    <a href="#" target="_blank">Materia e</a>
                </div>

            </aside>
        </section>

        <script src="js/inicio.js"></script>
    </body>
</html>