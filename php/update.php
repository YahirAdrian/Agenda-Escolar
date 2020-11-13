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
            $tarea_wilfirdo = $_GET['tarea_wilfrido'];
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
                
                $DELETE_SQL =
                "DELETE FROM Tareas WHERE Tareas.Materia = 'Calculo Integral';
                DELETE FROM Tareas WHERE Tareas.Materia = 'Ingles';
                DELETE FROM Tareas WHERE Tareas.Materia = 'CTSyV';
                DELETE FROM Tareas WHERE Tareas.Materia = 'Aplicaciones Web (Wilfrido)';
                DELETE FROM Tareas WHERE Tareas.Materia = 'Bases de Datos (Ek)';
                DELETE FROM Tareas WHERE Tareas.Materia = 'Fisica';
                ";
                $conexion->multi_query($DELETE_SQL); 

                $INSERT_SQL =
                "INSERT INTO Tareas (id,materia,tarea) values (NULL,'Calculo Integral', '$tarea_calculo');
                INSERT INTO Tareas (id,materia,tarea) values (NULL,'Ingles', '$tarea_ingles');
                INSERT INTO Tareas (id,materia,tarea) values (NULL,'CTSyV', '$tarea_ctsyv');
                INSERT INTO Tareas (id,materia,tarea) values (NULL,'Aplicaciones Web (Wilfrido)', '$tarea_wilfirdo');
                INSERT INTO Tareas (id,materia,tarea) values (NULL,'Bases de Datos (Ek)', '$tarea_ek');
                INSERT INTO Tareas (id,materia,tarea) values (NULL,'Fisica', '$tarea_fisica');
                ";
                $conexion->multi_query($INSERT_SQL); 

                echo("Actualizacion realizada con exito");
                $conexion ->close();
            }else{
                echo("Contraseña incorrecta");
            }
            
            
        ?>      
    </body>
</html>