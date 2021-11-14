<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administración</title>
        <link rel="stylesheet" href="css/admin.css">
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link rel="stylesheet" href="css/cabecera.css"/>
        <link rel="stylesheet" href="css/tablas.css"/>
       
         <link rel="icon" type="image/png" href="src/configuraciones.png">
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
        error_reporting(0);
            $sesion = $_SESSION["usuario"];
            if($sesion != "admin"){
                echo "
                    <div class='mensaje'>
                        <img src='src/icons/cerrar.png' alt='error'/>
                        <p class='texto-mensaje'>No autorizado o sesión expirada</p>
                    </div>
                ";

                echo "<script> setTimeout(()=> window.location = 'index.php', 2000);</script>";
                //de lo contrario, lo redirecciona al login

                die();
            }
        ?>

        <header>
                <div class="logo">
                    <img src="src/configuraciones.png" alt="icono"/>
                    <h1>Administración - 6AMPR</h1>
                </div>

                <div class="menu-final">
                </div>
                
            </header>

            <section>
                <div class="tareas">
                    <h3>Tareas</h3>
                    <button id="btnNuevaTarea" class="add-button">Agregar tarea <img src="src/mas.png"/ class="icon"></button>

                    <div id="nueva-tarea" style="display:none">
                        <form action="php/insertar_tarea.php" method="post">
                            <div class="input-fields">
                                <label for="materia">Materia</label>
                                <!-- <input type="text" name="materia" id="materia"/> -->
                                <select name="materia" id="materia">
                                    <option value="Aplicaciones Android">Aplicaciones Android</option>
                                    <option value="Aplicaciones IOS">Aplicaciones IOS</option>
                                    <option value="Temas de Fisica">Temas de Fisica</option>
                                    <option value="Probabilidad y estadistica">Probabilidad y estadistica</option>
                                    <option value="Filosofia">Filosofia</option>
                                    <option value="Dibujo tecnico">Dibujo tecnico</option>
                                </select>
                            </div>

                            <div class="input-fields">
                                <label for="tarea">Nombre de la tarea</label>
                                <input type="text" name="tarea" id="tarea"/>
                            </div>
                            
                            <div class="input-fields">
                                <label for="url">Direccion url</label>
                                <input type="text" name="url" id="url"/>
                            </div>

                            <div class="input-fields">
                                <label for="fecha-hora">Fecha límite</label>
                                <input type="date" name="fecha" id="fecha-hora"/>
                            </div>

                            <div class="input-fields">
                                <label for="hora">Hora límite</label>
                                <input type="time" name="hora" id="hora"/>
                            </div>

                            <div class="input-fields">
                                <button type="submit" id="ultimo" class="add-button"><img src="src/mas.png" class="icon"/></button>
                            </div>
                        </form>
                    </div>

                    <table>
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
                                        $tareas[$i] = array( $fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5]);
                                    }

                                    // Imprimir el array como se requiere en la tabla
                                    
                                    echo "<td class='tareas-lista'>";
                                    // echo "<div class='container'>";
                                    for($j = 0; $j<$numFilas; $j++){
                                        $id = $tareas[$j][0];
                                        echo "<materia data-id='" . $tareas[$j][0] . "'> <a href='php/eliminar.php?id=$id' class='eliminar'>Eliminar</a>
                                        <a href='php/editar.php?id=$id' class='editar'>Editar</a>
                                        <a href='" . $tareas[$j][3] . "' target='_blank'>" . $tareas[$j][2] . "</materia>";
                                        
                                    }
                                    echo "</td>";
                                    
                                    echo "<td class='fecha'>";
                                    for($k = 0; $k<$numFilas; $k++){
                                        echo "<materia data-id='" . $tareas[$k][0] . "'>" . $tareas[$k][4] . " " . $tareas[$k][5] . "</materia>";
                                        
                                    }
                                    // echo "</div>";
                                    echo "</td>";
                                    echo "</tr>";
                        
                                }
                                $resultado_materia->free();
                                $conexion->close();
                            }

                            imprimirFilaMateria('Aplicaciones Android', 'normal');
                            imprimirFilaMateria('Aplicaciones IOS', 'normal');
                            imprimirFilaMateria('Temas de Fisica', 'normal');
                            imprimirFilaMateria('Probabilidad y estadistica', 'normal');
                            imprimirFilaMateria('Filosofia', 'normal');
                            imprimirFilaMateria('Dibujo tecnico', 'normal');
                            ?>
                            </tbody>
                    </table>
                </div>

                <div class="reuniones">
                    <h3>Reuniones</h3>

                    <button class="add-button" id="btnProgramarReunion">Programar</button>

                    <form class="programar-reuniones" id="programar-reuniones" style="display:none" method="POST" action="php/actualizar_reuniones.php">
                        <table>
                            <thead>
                                <th>Materia</th>
                                <th>Hora inicio</th>
                                <th>Hora fin</th>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Aplicaciones Android</td>
                                    <td><input type="time" name="inicio_materia_a" class="hora-inicio"></td>
                                    <td><input type="time" name="fin_materia_a" class="hora-fin"></td>
                                </tr>

                                <tr>
                                    <td>Aplicaciones IOS</td>
                                    <td><input type="time" name="inicio_materia_b" class="hora-inicio"></td>
                                    <td><input type="time" name="fin_materia_b" class="hora-fin"></td>
                                </tr>

                                <tr>
                                    <td>Temas de Fisica</td>
                                    <td><input type="time" name="inicio_materia_c" class="hora-inicio"></td>
                                    <td><input type="time" name="fin_materia_c" class="hora-fin"></td>
                                </tr>

                                <tr>
                                    <td>Probabilidad y estadistica</td>
                                    <td><input type="time" name="inicio_materia_d" class="hora-inicio"></td>
                                    <td><input type="time" name="fin_materia_d" class="hora-fin"></td>
                                </tr>

                                <tr>
                                    <td>Filosofia</td>
                                    <td><input type="time" name="inicio_materia_e" class="hora-inicio"></td>
                                    <td><input type="time" name="fin_materia_e" class="hora-fin"></td>
                                </tr>

                                <tr>
                                    <td>Dibujo tecnico</td>
                                    <td><input type="time" name="inicio_materia_f" class="hora-inicio"></td>
                                    <td><input type="time" name="fin_materia_f" class="hora-fin"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="botones">
                            <button type="submit" id="listo" name="listo" class="add-button">Listo</button>
                        </div>
                    </form>

                    <table>
                        <thead>
                            <th>Materia</th>
                            <th>Hora</th>
                        </thead>

                        <tbody>
                        <?php
                                require('php/abrir_conexion.php');
                                $consulta = "SELECT * FROM reuniones";
                            
                                $resultado = $conexion->query($consulta);
                                $numFilas = $resultado->num_rows;
                        
                                if($resultado){
                                    for ($i=0; $i <$numFilas ; $i++) { 
                                        $fila = $resultado->fetch_Object();
                                        echo "<tr>";
                                        echo "<td>" . $fila->materia . "</td>";
                                        echo "<td id='hora'>" . $fila->hora_inicio . " - " . $fila->hora_fin . "</td>";
                                        echo "</tr>";
                                    }
                        
                                }
                                $resultado->free();
                                $conexion->close();
                            ?>
                        </tbody>
                    </table>
                </div>

                
                <div class="avisos">
                    <h3>Avisos</h3>
                    <button id="nuevo-aviso" class="add-button">Nuevo aviso <img src="src/mas.png" class="icon"/></button>
                    
                    <form action="php/agregar_aviso.php" method="POST" id="formulario-aviso" style="display:none">
                        <input type="text" name="titulo" placeholder="Titulo"/>
                        <textarea name="contenido" id="html" style="display:none"></textarea>
                        <div id="editor" name="aviso">
                            
                        </div>
                        
                        <button type="submit" class="add-button" name="agregar-aviso" id="agregar-aviso" onclick="copiarHTML()">Agregar aviso</button>
                    </form>

                    <table>
                        <thead>
                            <th>id</th>
                            <th>titulo</th>
                            <th>contenido</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                        </thead>

                        <tbody>
                        <?php
                                require('php/abrir_conexion.php');
                                $consulta = "SELECT * FROM notificaciones WHERE de = 'admin';";
                            
                                $resultado = $conexion->query($consulta);
                                $numFilas = $resultado->num_rows;
                        
                                if($resultado){
                                    for ($i=0; $i <$numFilas ; $i++) { 
                                        $fila = $resultado->fetch_array();
                                        echo "<tr>";
                                        echo "<td>" . $fila["id"] . "</td>";
                                        echo "<td>" . $fila["titulo"] . "</td>";
                                        echo "<td>" . $fila["descripcion"] . "</td>";
                                        echo "<td>" . $fila["fecha"] . "</td>";
                                        echo "<td>" . $fila["hora"] . "</td>";
                                        echo "</tr>";
                                    }
                        
                                }
                                $resultado->free();
                                $conexion->close();
                            ?>
                        </tbody>
                    </table>
                </div>
                
                <!--<div class="foro">
                    <h3>Foro</h3>
                    <a href="foro.php" target="_blank"><button id="foro" class="add-button">Administrar foro</button></a>
                </div>-->

                <div class="foro">
                    <h3>Cerrar Sesión</h3>
                    <a href="php/cerrar_sesion.php" id="cerrar_sesion"><button>Cerrar Sesión</button></a>
                </div>
            </section>
            <script src="js/admin.js"></script>
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
            <!-- Initialize Quill editor -->
            <script>
              var quill = new Quill('#editor', {
                theme: 'snow'
              });
              
              function copiarHTML(){
                  document.querySelector('#html').value=quill.container.firstChild.innerHTML;
              }
            </script>
    </body>
</html>