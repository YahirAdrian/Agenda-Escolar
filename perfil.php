<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil</title>
        <link rel="stylesheet" href="css/perfil.css"/>
    </head>

    <body>

        <header>
                <div class="logo">
                    <img src="src/calendario.png" alt="icono"/>
                    <h1>Agenda Escolar - [Nombre]</h1>
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
                <img src="src/usuario.png" alt="foto perfil"/>
                <p id="editar">Cambiar foto</p>
                <input type="file" name="archivo" id="archivo">
            </form>

            <div class="info">
                <p class="info-dato">Nombre : <span>Mi nombre</span></p>
                <p class="info-dato">Apelldos : <span>Apellidos</span></p>
                <p class="info-dato">Grupo : <span>6AMPR</span></p>
            </div>
        </section>
    </body>
</html>