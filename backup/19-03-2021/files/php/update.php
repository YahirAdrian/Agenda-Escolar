<html>
    <head>
        <title>Prueba de conexión a base de datos</title>
        <meta charset="utf-8"/>
    </head>

    <body>
        <?php
        //Identificacion de los campos de texto

            //Campos de tarea:
            $tarea_calculo = $_POST['tarea_calculo'];
            $tarea_fisica = $_POST['tarea_fisica'];
            $tarea_ctsyv = $_POST['tarea_ctsyv'];
            $tarea_wilfrido = $_POST['tarea_wilfrido'];
            $tarea_ek = $_POST['tarea_ek'];
            $tarea_ingles = $_POST['tarea_ingles'];
            //Campos de horario:
            $hora_calculo =$_POST['hora_calculo'];
            $hora_fisica = $_POST['hora_fisica'];
            $hora_ctsyv = $_POST['hora_ctsyv'];
            $hora_wilfrido = $_POST['hora_wilfrido'];
            $hora_ek = $_POST['hora_ek'];
            $hora_ingles = $_POST['hora_ingles'];
            $hora_actualizacion = $_POST['hora_actualizacion'];
            //Contraseña:
            $campo_contrasena = $_POST['password'];

           //Conexion a la base de datos:
           $servername = "localhost";
            $database = "id15224713_agendaescolar";
            $username = "id15224713_agenda";
            $password = "EnjoyCoding1;";

            if($campo_contrasena == "EnjoyCoding1")
            {
                $conexion = new mysqli($servername, $username, $password, $database);

                if ($conexion->connect_error){
                    die('Error de Conexion ('.$db->connect_error.')'.$db->connect_error);
                }
                
                $UPDATE_SQL_calculo = "UPDATE Tareas SET tarea = '$tarea_calculo' WHERE Tareas.materia = 'Calculo Integral';";
                $UPDATE_SQL_INGLES = "UPDATE Tareas SET tarea = '$tarea_ingles' WHERE Tareas.materia = 'Ingles';";
                $UPDATE_SQL_CTSYV = "UPDATE Tareas SET tarea = '$tarea_ctsyv' WHERE Tareas.materia = 'CTSyV';";
                $UPDATE_SQL_WILFRIDO = "UPDATE Tareas SET tarea = '$tarea_wilfrido' WHERE Tareas.materia = 'Aplicaciones Web';";
                $UPDATE_SQL_EK = "UPDATE Tareas SET tarea = '$tarea_ek' WHERE Tareas.materia = 'Bases de Datos';";
                $UPDATE_SQL_FISICA ="UPDATE Tareas SET tarea = '$tarea_fisica' WHERE Tareas.materia = 'Fisica';";
                //ACTUALIZACION DE HORARIOS
                $UPDATE_HORARIO_CALCULO = "UPDATE Reuniones SET Hora = '$hora_calculo' WHERE Reuniones.Materia = 'Calculo Integral';";
                $UPDATE_HORARIO_INGLES = "UPDATE Reuniones SET Hora = '$hora_ingles' WHERE Reuniones.Materia = 'Ingles';";
                $UPDATE_HORARIO_CTSYV = "UPDATE Reuniones SET Hora = '$hora_ctsyv' WHERE Reuniones.Materia = 'CTSyV';";
                $UPDATE_HORARIO_WILFRIDO = "UPDATE Reuniones SET Hora = '$hora_wilfrido' WHERE Reuniones.Materia = 'Aplicaciones Web';";
                $UPDATE_HORARIO_EK = "UPDATE Reuniones SET Hora = '$hora_ek' WHERE Reuniones.Materia = 'Bases de Datos';";
                $UPDATE_HORARIO_FISICA = "UPDATE Reuniones SET Hora = '$hora_fisica' WHERE Reuniones.Materia = 'Fisica';";
                $UPDATE_HORARIO_TIME = "UPDATE Reuniones SET Hora = 'z$hora_actualizacion' WHERE Reuniones.Materia = 'Actualizacion';";

                $conexion->multi_query($UPDATE_SQL_calculo);
                $conexion->multi_query($UPDATE_SQL_INGLES);
                $conexion->multi_query($UPDATE_SQL_CTSYV);
                $conexion->multi_query($UPDATE_SQL_WILFRIDO);
                $conexion->multi_query($UPDATE_SQL_EK);
                $conexion->multi_query($UPDATE_SQL_FISICA);

                $conexion->multi_query($UPDATE_HORARIO_CALCULO);
                $conexion->multi_query($UPDATE_HORARIO_INGLES);
                $conexion->multi_query($UPDATE_HORARIO_CTSYV);
                $conexion->multi_query($UPDATE_HORARIO_WILFRIDO);
                $conexion->multi_query($UPDATE_HORARIO_EK);
                $conexion->multi_query($UPDATE_HORARIO_FISICA);
                $conexion->multi_query($UPDATE_HORARIO_TIME);
                
                echo "<h1>Actualizado con exito<h1>";
                echo "<a href='../index.php'>Volver al inicio</a>";
                $conexion ->close();
            }else{
                echo("Contraseña incorrecta");
            }
            
            
        ?>      
    </body>
</html>