<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administración</title>
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/cabecera.css">
    </head>

    <body>
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
                        <form action="#" method="post">
                            <div class="input-fields">
                                <label for="materia">Materia</label>
                                <input type="text" name="materia" id="materia"/>
                            </div>

                            <div class="input-fields">
                                <label for="tarea">Nombre de la tarea</label>
                                <input type="text" name="tarea" id="tarea"/>
                            </div>

                            <div class="input-fields">
                                <label for="fecha-hora">Fecha y hora límite</label>
                                <input type="datetime-local" name="fecha-hora" id="fecha-hora"/>
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
                                <tr>
                                    <td>Materia A</td>

                                    <td class="tareas-lista">
                                            <materia>Tarea 1</materia>
                                            <materia>Tarea2</materia>
                                    </td>
                                    <td class="fecha" rowspan="2">
                                            <materia>dd/mm/aaaa a las hh:mm</materia>
                                            <materia>dd/mm/aaaa a las hh:mm</materia>
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                </div>

                <div class="reuniones">
                    <h3>Reuniones</h3>

                    <button class="add-button" id="btnProgramarReunion">Programar</button>

                    <form class="programar-reuniones" id="programar-reuniones" style="display:none">
                        <table>
                            <thead>
                                <th>Materia</th>
                                <th>Hora inicio</th>
                                <th>Hora fin</th>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><input type="text" name="materia-reunion" id="materia-reunion"></td>
                                    <td><input type="time" name="hora-inicio" id="hora-inicio"></td>
                                    <td><input type="time" name="hora-inicio" id="hora-fin"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="botones">
                            <button id="nueva-fila" class="add-button">Fila <img src="src/mas.png" class="icon"/></button>
                            <button type="submit" id="listo" name="listo" class="add-button">Listo</button>
                        </div>
                    </form>

                    <table>
                        <thead>
                            <th>Materia</th>
                            <th>Hora</th>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Materia a</td>
                                <td>hh:mm - hh:mm</td>
                            </tr>
                            <tr>
                                <td>Materia b</td>
                                <td>hh:mm - hh:mm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                
                <div class="avisos">
                    <h3>Avisos</h3>
                    <button id="nuevo-aviso" class="add-button">Nuevo aviso <img src="src/mas.png" class="icon"/></button>
                    
                    <form action="#" method="POST" id="formulario-aviso" style="display:none">
                        <textarea name="aviso" id="aviso"></textarea>
                        <button type="submit" class="add-button" name="agregar-aviso" id="agregar-aviso">Agregar aviso</button>
                    </form>
                </div>
                
                <div class="foro">
                    <h3>Foro</h3>
                    <a href="foro.php" target="_blank"><button id="foro" class="add-button">Administrar foro</button></a>
                </div>
            </section>
            <script src="js/admin.js"></script>
    </body>
</html>