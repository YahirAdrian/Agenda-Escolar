<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        <link rel="stylesheet" href="css/inicio.css">
    </head>
    <body>
    <header>
            <div class="logo">
                <img src="src/calendario.png" alt="icono"/>
                <h1>Agenda Escolar</h1>
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
        
        <div class="grupo">
            <h2>6AMPR</h2>
        </div>

        <section>
            <div class="tareas">
                <div id="por-entregar">
                    <h3 id="primero">Tareas por entregar</h3>
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
                                        <materia>  <input type="checkbox"/> dd/mm/aaaa a las hh:mm</materia>
                                        <materia>  <input type="checkbox"/> dd/mm/aaaa a las hh:mm</materia>
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
                                        <materia>Tarea 1</materia>
                                        <materia>Tarea2</materia>
                                </td>
                                <td class="fecha" rowspan="2">
                                        <materia>  <input type="checkbox"/> dd/mm/aaaa a las hh:mm</materia>
                                        <materia>  <input type="checkbox"/> dd/mm/aaaa a las hh:mm</materia>
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
                                        <materia>Tarea 1</materia>
                                        <materia>Tarea2</materia>
                                </td>
                                <td class="fecha" rowspan="2">
                                        <materia>  <input type="checkbox"/> dd/mm/aaaa a las hh:mm</materia>
                                        <materia>  <input type="checkbox"/> dd/mm/aaaa a las hh:mm</materia>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

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
    </body>
</html>