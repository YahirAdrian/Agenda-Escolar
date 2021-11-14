<?php
    session_start(); 
    if(isset($_SESSION['usuario'])){
        require('php/abrir_conexion.php');
        $result = $conexion->query('SELECT * FROM mensajes');
        $resultado_nombres = $conexion->query('SELECT id, nombres, foto FROM usuarios');
        $num_nombres = $resultado_nombres->num_rows;
        $nombres = array();
        for($j= 0; $j<$num_nombres; $j++){
            $user_element = $resultado_nombres->fetch_array();
            $id_user = $user_element[0];
            $name_user = $user_element[1];
            $foto_user = $user_element[2];
            array_push($nombres, $id_user);
            array_push($nombres, $name_user);
            array_push($nombres, $foto_user);
        }
        
        
        
    }else{
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mensaje de despedida</title>
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link rel="stylesheet" href="css/despedida.css"/>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">   
        <link rel="shortcut icon" href="src/icons/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="src/icons/pwa_icons/icon_96.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="#3F51B5">
        <meta name="theme-color" content="#3F51B5">
    </head>

    <body>
        <header>
            <div class="encabezado">
                <nav>
                    <ul>
                        <li><a href="inicio.php">Regresar</a></li>
                    </ul>
                </nav>
                <img src="src/img/presentacion/gorro.svg" alt="Gorro de graduacion" id="gorro">
                <div style="display: flex; align-items:center;">
                    <img src="src/calendario.png" alt="icono agenda" width="50px"/>
                    <h1 style="padding-left: 15px; width: 50%; display: inline-block">Foro de despedida</h1>
                </div>
            </div>
        </header>
        
        <section>
            <img src="src/img/presentacion/avion-de-papel.svg" alt="avion-de-papel" width="80px" id="avion"/>
            <div style="width: 90%;
            margin: auto;
            background: #eeeeee;
            border-radius: 4px;
            box-shadow: #646060 2px 5px 4px;
            padding: 8px;">
                <h3>En esta sección puedes escribir un mensaje final de despedida para tus compañeros</h3>
                <span class="instrucciones">
                    Puedes empezar dando un mensaje para tus compañeros, algún buen momento que hayan pasado, una experiencia, consejos, desearles éxito en sus metas o algún mensaje de motivación dirigido a ellos
                </span>
            </div>
                
                <form action="php/agregar_mensaje.php" method="post" id="formulario">
                <h2>Escribe un mensaje para tus compañeros</h2>

                <div id="editor">
                    <h1>Mensaje de despedida para mi grupo 6AMPR</h1>
                    <p>Escribe tu mensaje aqui</p>
                </div>
                <input type="hidden" name="mensaje" id="mensaje"/>
                <input type="submit" value="Enviar" id="submit"/>
            </form>

            <div class="mensajes">
                <h3>Mensajes de tus compañeros</h3>
                <?php
                    $numFilas = $result->num_rows;
    
                    if($result){
                        for ($i=0; $i <$numFilas ; $i++) { 
                            $fila = $result->fetch_Object();
                            $nombre_usuario_post = $fila->id_usuario;
                            
                            $mensaje_post = $fila->mensaje;
                            $fecha_post = $fila->fecha;
                            $hora_post = $fila->hora;
                            
                            //Buscar el nombre en el array
                            $id_buscar = $nombre_usuario_post;
                            $autor_post = $nombres[array_search($id_buscar, $nombres)+1];
                            $foto_persona = $nombres[array_search($id_buscar, $nombres) +2];
                        
                            
                            echo "
                                <div class='mensaje'>
                                    <span class='icono-perfil' style='background-color:$foto_persona'>A</span>
                                    <div class='info'>
                                        <span class='nombre-usuario'>$autor_post</span>
                                        <span class='fecha-y-hora'> $fecha_post    $hora_post</span>
                                    </div>
    
                                    <div class='contenido'>
                                        <div class='mensaje'>
                                            $mensaje_post
                                        </div>
                                    </div>
                                    
                                </div>
                            ";
                        }
    
                    }
                    $result->free();
                    $conexion->close();
                ?>
            </div>

        </section>

        <footer>
            <h1>Agenda Escolar</h1>
            <h2>6AMPR</h2>
        </footer>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            var quill = new Quill('#editor', {
              theme: 'snow'
            });
            </script>
        <script src="js/despedida.js"></script>
    </body>
</html>