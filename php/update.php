<html>
    <head>
        <title>Prueba de conexión a base de datos</title>
        <meta charset="utf-8"/>
    </head>

    <body>
        <?php
        //Identificacion de los campos de texto

            //Campos de tarea:
            $tarea_calculo = $_GET['tarea_calculo'];
            $tarea_fisica = $_GET['tarea_fisica'];
            $tarea_ctsyv = $_GET['tarea_ctsyv'];
            $tarea_wilfrido = $_GET['tarea_wilfrido'];
            $tarea_ek = $_GET['tarea_ek'];
            $tarea_ingles = $_GET['tarea_ingles'];
            //Campos de horario:
            $hora_calculo = $_GET['hora_calculo'];
            $hora_fisica = $_GET['hora_fisica'];
            $hora_ctsyv = $_GET['hora_ctsyv'];
            $hora_wilfrido = $_GET['hora_wilfrido'];
            $hora_ek = $_GET['hora_ek'];
            $hora_ingles = $_GET['hora_ingles'];
            //Contraseña:
            $campo_contrasena = $_GET['password'];

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

                $conexion->multi_query($UPDATE_SQL_calculo);
                $conexion->multi_query($UPDATE_SQL_INGLES);
                $conexion->multi_query($UPDATE_SQL_CTSYV);
                $conexion->multi_query($UPDATE_SQL_WILFRIDO);
                $conexion->multi_query($UPDATE_SQL_EK);
                $conexion->multi_query($UPDATE_SQL_FISICA);

                echo("Actualizacion realizada con exito");
                echo "<br/>" . $UPDATE_SQL;
                $conexion ->close();
            }else{
                echo("Contraseña incorrecta");
            }
            
            
        ?>      
    </body>
</html>