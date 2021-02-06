<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        <link rel="stylesheet" href="css/inicio.css">
        <link rel="stylesheet" href="css/responsive/inicio.css">
        <link rel="shortcut icon" href="src/icons/favicon.ico" type="image/x-icon">
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
                <div class="caja-icono" style="display:none">
                    <img src="src/notificacion.png" alt="notificaciones" id="icono-notificacion"/>
                    <!-- <div id="numero-notificaciones">
                        <span >.n.</span>
                    </div> -->
                    <div class="caja-notificaciones" style ="display:none">
                        <table id="tabla_notificaciones">
                            <thead>
                                <th>Notificaciones</th>
                            </thead>
                            <tbody>
                            <?php
                                require('php/abrir_conexion.php');
                                $consulta = "SELECT de, descripcion FROM notificaciones WHERE de = 'admin';";
                            
                                $resultado = $conexion->query($consulta);
                                $numFilas = $resultado->num_rows;
                        
                                if($resultado){
                                    for ($i=0; $i <$numFilas ; $i++) { 
                                        $fila = $resultado->fetch_Object();
                                        echo "<tr class='notificacion'>";
                                        echo "<td><span class='de'>" . $fila->de . "</span><br/>" . $fila->descripcion . "</td>";
                                        echo "</tr>";
                                    }
                        
                                }
                                $resultado->free();
                                $conexion->close();
                            ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>

                <div class="caja-icono">
                <a href="foro.php" style="display:none"><img src="src/charla.png" alt="foro"/></a>
                </div>

                <div class="caja-icono" id="icono-usuario">
                    <?php echo "<a href='perfil.php' id='foto' style='background: $foto'>"?>
                        <span id="nombre"></span>
                        <!-- <img src="src/usuario.png" alt="usuario" id="imagen-usuario"/> -->
                    </a>
                    <span id="nombre-usuario"><?php echo $nombres; ?></span>
                </div>
            </div>
            
        </header>
        
        <div class="grupo">
            <h2>6AMPR</h2>
        </div>

        <section>
            <div class="tareas">

                <div class="reuniones">
                    <h3 id="primero"><span class="display"></span> Reuniones para mañana </h3>
                    <table id="tabla_reuniones">
                        <thead>
                            <th>Materia</th>
                            <th>Hora</th>
                        </thead>

                        <tbody>
                            <?php
                                require('php/abrir_conexion.php');
                                $consulta = "SELECT * FROM reuniones ORDER BY hora_inicio";
                            
                                $resultado = $conexion->query($consulta);
                                $numFilas = $resultado->num_rows;
                        
                                if($resultado){
                                    for ($i=0; $i <$numFilas ; $i++) { 
                                        $fila = $resultado->fetch_Object();
                                        if($fila->hora_inicio != '00:00:00'){
                                            echo "<tr>";
                                            echo "<td data-titulo='Materia:' class='no-color'>" . $fila->materia . "</td>";
                                            echo "<td id='hora'>" . $fila->hora_inicio . " - " . $fila->hora_fin . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                        
                                }
                                $resultado->free();
                                $conexion->close();
                            ?>
                        </tbody>
                    </table>
                </div>

                <div id="por-entregar">
                    <h3><span class="display"></span> Tareas por entregar</h3>
                    <table id="tabla_tareas">
                        <thead>
                            <th>Materia</th>
                            <th>Tareas</th>
                            <th>Fecha de Vencimiento</th>
                        </thead>
                        <tbody>
                            <?php
                            // $conexion_global = $conexion;
                            function imprimirFilaMateria($materia){
                                require('php/abrir_conexion.php');
                                $consulta = "SELECT * FROM tareas WHERE materia = '$materia' ORDER BY fecha_limite";
                                
                                $resultado_materia = $conexion->query($consulta);
                                $numFilas = $resultado_materia->num_rows;
                                
                                if($resultado_materia){
                                    $tareas = array();
                                    echo "<tr>";
                                    echo "<td data-titulo='Materia:'> $materia</td>";

                                    // Volcar el array devuelto por mysql en otro nuevo
                                    for($i = 0; $i<$numFilas; $i++){
                                        $fila = $resultado_materia->fetch_array();
                                        $tareas[$i] = array( $fila[0], $fila[1], $fila[2], $fila[3], $fila[4]);
                                    }

                                    // Imprimir el array como se requiere en la tabla
                                    echo "<td class='tareas-lista'>";
                                    // echo "<div class='container'>";
                                    for($j = 0; $j<$numFilas; $j++){
                                        echo "<materia data-id='" . $tareas[$j][0] . "'> <input type='checkbox' data-id='" . $tareas[$j][0] . "'/> " . $tareas[$j][2] . "</materia>";
                                        
                                    }
                                    echo "</td>";
                                    
                                    echo "<td class='fecha'>";
                                    for($k = 0; $k<$numFilas; $k++){
                                        echo "<materia data-id='" . $tareas[$k][0] . "'>" . $tareas[$k][3] . " " . $tareas[$k][4] . "</materia>";
                                        
                                    }
                                    // echo "</div>";
                                    echo "</td>";
                                    echo "</tr>";
                        
                                }
                                $resultado_materia->free();
                                $conexion->close();
                            }

                            imprimirFilaMateria('materia A', 'normal');
                            imprimirFilaMateria('materia B', 'normal');
                            imprimirFilaMateria('materia C', 'normal');
                            imprimirFilaMateria('materia D', 'normal');
                            imprimirFilaMateria('materia E', 'normal');
                            imprimirFilaMateria('materia F', 'normal');
                            ?>
                        </tbody>
                    </table>
                </div>

                <div id="entregadas">
                <h3><span class="display"></span> Tareas Entregadas</h3>
                    <table id=tabla_entregadas>
                        <thead>
                            <td>Materia</td>
                            <td>Tarea</td>
                            <td>Entregado</td>
                        </thead>
                        <tbody>
                            <?php
                                require('php/abrir_conexion.php');
                                $consulta = "SELECT * FROM tareacompletada_usuario WHERE id_usuario = $usuario_id;";
                                $tareas_completadas = array();
                                $resultado_materia = $conexion->query($consulta);
                                $numFilas = $resultado_materia->num_rows;

                                for($i = 0; $i<$numFilas; $i++){
                                    $fila = $resultado_materia->fetch_array();
                                    $tareas_completadas[$i] = array($fila[1], $fila[3], $fila[4]);
                                }

                                $resultado_materia->free();
                                $conexion->close();

                                function imprimirFilaIdTarea($tarea){
                                    require('php/abrir_conexion.php');
                                    $consulta = "SELECT * FROM tareas WHERE id = " . $tarea[0];
                                    $resultado_materia = $conexion->query($consulta);
                                    $numFilas = $resultado_materia->num_rows;

                                    $fila = $resultado_materia->fetch_array();
                                    echo "<tr>";
                                    echo "<td data-titulo='Materia:' class='no-color'>" . $fila[1] . "</td>";
                                    echo "<td data-id='" . $tarea[0] . "'>" . $fila[2] . "</td>";
                                    echo "<td class='fecha_entregada'>" . $tarea[1] . " " . $tarea[2]  .  "</td>";
                                    echo "</tr>";

                                    $resultado_materia->free();
                                    $conexion->close();
                                }

                                for($i = 0; $i<sizeof($tareas_completadas); $i++){
                                    imprimirFilaIdTarea($tareas_completadas[$i]);
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div id="vencidas">
                <h3>
                     <span class="display"></span>
                     Tareas Vencidas
                </h3>
                    <table id="tabla_vencidas">
                        <thead>
                            <td>Materia</td>
                            <td>Tareas</td>
                            <td>Venció</td>
                        </thead>
                        <tbody>
                        
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

        <div id="alert_box" style="display: none">
            <form id="alert" action="#" method="POST">
                <p id="titulo_alert">¿Has completado esta tarea?</p>
                <p id="sub_alert">La tarea se moverá a la seccion de tareas completadas</p><br>
                <div class="inputs">
                    <input type="text" name="tarea_mover_nombre" id="input_tarea" disabled="disabled"/><br>
                    <input type="text" name="id_tarea" id="id_tarea_input"  style="display: none"/><br>
                </div>
                
                <div class="botones_alert">
                    <input type="submit" value="Si" id="si" name="btnSubmit"/>
                    <button type="reset" id="no">No</button>
                </div>
            </form>
        </div>

        <?php
        if(isset($_POST["btnSubmit"])){
            require('php/abrir_conexion.php');
            $id_tarea = $_POST["id_tarea"];
            $consulta = "INSERT INTO `tareacompletada_usuario` (id, id_tarea, id_usuario, fecha, hora) VALUES (NULL, '$id_tarea', '$id', CURRENT_DATE(), CURRENT_TIME())";
            $conexion->query($consulta);
            $conexion->close();
            
            echo "<script> window.location = 'inicio.php';</script>";
        }
        ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/locale/es.js"></script>
        <script src="js/inicio.js"></script>
    </body>
</html>