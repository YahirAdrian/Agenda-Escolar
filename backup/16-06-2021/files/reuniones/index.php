<!DOCTYPE html>
<html>
    <head lang="es">
        <meta charset="utf-8"/>
        <title>Reuniones 6AMPR</title>
        <link rel="stylesheet" href="../css/inicio.css"/>
        <link rel="shortcut icon" href="../src/icons/favicon.ico" type="image/x-icon">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="#3F51B5">
        <meta name="theme-color" content="#3F51B5">
        <style>
            body{
                display: flex;
                flex-direction: row;
                justify-content: center;
            }
            .reuniones{
                border: 1px solid #010101;
                background: #fff;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <div class="reuniones">
            <h3 id="primero"><span class="display"></span> Reuniones <span id="para"></span></h3>
            <p id="actualizacion">Ultima actualización: 
                <?php
                    require('../php/abrir_conexion.php');
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
                        require('../php/abrir_conexion.php');
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
        <aside>
                <div id="caja-horario">
                    <h3><a href="src/Horario.pdf" style="color: black;">Horario</a></h3>
                    <img src="../src/Horario.png" alt="horario"/>
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
            
            <script src="../js/inicio.js"></script>
    </body>
</html>