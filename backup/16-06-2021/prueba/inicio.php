<?php session_start();
error_reporting(0);
        if($_SESSION["usuario"] == "adminer"){
            header('location: admin.php');
        }

        require('php/abrir_conexion.php');
        $usuario_id = $_SESSION["usuario"];

        if($usuario_id == null || $usuario_id == ''){ //Verificar si ha iniciado sesion
            // echo "
            // <div class='mensaje'>
            //     <img src='src/icons/cerrar.png' alt='error'/>
            //     <p class='texto-mensaje'>Sesion expirada</p>
            // </div>
            // ";

            // echo "<script> setTimeout(()=> window.location = 'index.php', 2000);</script>";
            // //de lo contrario, lo redirecciona al login
            header('location: index.php');
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio 6AMPR</title>
        <link rel="stylesheet" href="css/inicio.css">
        <link rel="stylesheet" href="css/responsive/inicio.css">
        <link rel="shortcut icon" href="src/icons/favicon.ico" type="image/x-icon">
        <link rel="icon" type="image/png" href="src/icons/opera_icon.png">
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

    <header>
            <div class="logo">
                <img src="src/calendario.png" alt="icono"/>
                <h1>Agenda Escolar</h1>
            </div>

            <div class="menu-final">
                <div classs="caja-icono">
                    <a href="mensaje_despedida.html">
                        <img src="src/favorito.png" alt="corazon" style="width: 45px; height: 45px;"/>
                    </a>
                </div>
                 <div class="caja-icono">
                    <img src="src/icons/update.png" alt="actualizar" id="updateButton"/>
                </div>
                
                
                <div class="caja-icono" style="display:none">
                    <img src="src/notificacion.png" alt="notificaciones" id="icono-notificacion"/>
                     <div id="numero-notificaciones">
                        <span >.n.</span>
                    </div>
                    <div class="caja-notificaciones" style="display:none; z-index: 3">
                        <table id="tabla_notificaciones">
                            <thead>
                                <th>Notificaciones</th>
                            </thead>
                            <tbody>
                            <?php
                                require('php/abrir_conexion.php');
                                $consulta = "SELECT id,de, titulo,descripcion FROM notificaciones WHERE de = 'admin';";
                            
                                $resultado = $conexion->query($consulta);
                                $numFilas = $resultado->num_rows;
                        
                                if($resultado){
                                    for ($i=0; $i <$numFilas ; $i++) { 
                                        $fila = $resultado->fetch_Object();
                                        $id_n=$fila->id;
                                        echo "<tr class='notificacion'>";
                                        echo "<td><span class='de'><a href='notificacion.php?id=$id_n'>" . $fila->titulo . "</a></span>";
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
                    <h3 id="primero"><span class="display"></span> Reuniones <span id="para"></span></h3>
                    <p id="actualizacion">Ultima actualización: 
                        <?php
                            require('php/abrir_conexion.php');
                            $consulta = "SELECT datos FROM data WHERE nombre = 'actualizacion de reuniones'";
                            $resultado = $conexion->query($consulta);
                            $fila = $resultado->fetch_Object();
                            
                            echo "<span>" . $fila->datos . "</span>";
                            
                            $resultado->free();
                            $conexion->close();
                        ?>
                    </p>
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
                                            echo "<td id='hora'>" . "<span class='hora_inicio'>" . $fila->hora_inicio . "</span> - <span class='hora_fin'>" . $fila->hora_fin . "</span></td>";
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
                    <h3><span class="display"></span> Tareas por entregar
                        <span class="numero" id="n_entregar">
                            <?php
                            require("php/abrir_conexion.php");
                            $tareasTotales =  $conexion->query("SELECT COUNT(*) FROM tareas;")->fetch_array();
                            $tareasEntregadas = $conexion->query("SELECT COUNT(*) FROM tareacompletada_usuario WHERE id_usuario = '$id'")->fetch_array();
                            $tareasVencidas = $conexion->query("SELECT COUNT(*) FROM tareas WHERE fecha_limite < NOW()")->fetch_array();
                            
                            ?>
                        </span>
                    </h3>
                    
                    <table id="tabla_tareas">
                        <thead>
                            <th>Materia</th>
                            <th>Tareas</th>
                            <th>Fecha de Vencimiento</th>
                        </thead>
                        <tbody>
                            <!--Aqui se eliminó el php-->
                            <?php require("imprimirTareas.php");?>
                        </tbody>
                    </table>
                </div>

                <div id="entregadas">
                <h3><span class="display"></span> Tareas Entregadas 
                    <span class="numero" id="n_entregadas">
                        <?php echo "(" . $tareasEntregadas[0] ."/" .$tareasTotales[0] .  ")";?>
                    </span>
                </h3>
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
                    <h3><a href="src/Horario.pdf" style="color: black;">Horario</a></h3>
                    <img src="src/Horario.jpg" alt="horario"/>
                </div>

                <div id="acceso">
                    <h3>Acceso</h3>
                    <a href="https://cbtis28-2021.ozelot.tech/my/" target="_blank" id="ozelot" rel='noopener noreferrer'>Ozelot</a>
                    <a href="https://us04web.zoom.us/j/75550512555?pwd=YllrNnV0VmRNTWFxWWhFd2huQkxsdz09" target="_blank" rel='noopener noreferrer'>Aplicaciones Android</a>
                    <a href="https://us04web.zoom.us/j/71791193674?pwd=UFBidVRUUXB5a040V1JiUVdXNWx6Zz09" target="_blank" rel='noopener noreferrer'>Aplicaciones IOS</a>
                    <a href="https://cbtis28-2021.ozelot.tech/mod/url/view.php?id=7953" target="_blank" rel='noopener noreferrer'>Temas de Fisica</a>
                    <a href="https://cbtis28-2021.ozelot.tech/course/view.php?id=720" target="_blank" rel='noopener noreferrer'>Probabilidad y estadistica</a>
                    <a href="https://us04web.zoom.us/j/8449035918?pwd=M3BPb0pmTGZBYVIzVTVJcEgxenN0Zz09" target="_blank" rel='noopener noreferrer'>Filosofia</a>
                    <a href="https://meet.google.com/fjk-ccwa-ujs" target="_blank" rel='noopener noreferrer'>Dibujo tecnico</a>
                </div>

            </aside>
        </section>

        <div id="alert_box" style="display: none">
            <form id="alert" action="php/entregarTarea.php" method="POST">
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/locale/es.js"></script>
        <script src="js/inicio.js"></script>
        <script src="app.js"></script>
    </body>
</html>