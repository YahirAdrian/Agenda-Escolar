<html>
    <head>
        <title>Prueba de conexión a base de datos</title>
        <meta charset="utf-8"/>
    </head>

    <body>
        <?php

           /*Consulta para actualizar una fila: UPDATE `Tareas` SET `tarea` = 'Principio de Arquimedesa' WHERE `Tareas`.`id` = 6;*/
           $servername = "localhost";
            $database = "id15224713_agendaescolar";
            $username = "id15224713_agenda";
            $password = "EnjoyCoding1;";
            
            $db = new mysqli($servername, $username, $password, $database);

            if ($db->connect_error){
                die('Error de Conexion ('.$db->connect_error.')'.$db->connect_error);
            }
            
            $query = "SELECT * FROM Reuniones";
            $result = $db->query($query);
            $numfilas = $result->num_rows;
            //echo "El número de elementos es ".$numfilas;

            for ($x=0;$x<$numfilas;$x++) {
                $fila = $result->fetch_object();
                echo "<tr>";
                echo "<td>" .$fila->Hora."</td>";
                echo "<td>" .$fila->Materia."</td>";
                echo "<td>" .$fila->Observacion."</td>";
                echo "</tr>";
            }

            $result->free();
            $db->close();
        ?>

        <?php
                       /* $db = new mysqli("mysql.webcindario.com", "areasverdescbtis", "EnjoyCoding1", "areasverdescbtis");

                        if ($db->connect_error){
                            die('Error de Conexion ('.$db->connect_errno.')'.$db->connect_error);
                        }

                        $query = "SELECT * FROM Visitantes";
                        $result = $db->query($query);
                        $numfilas = $result->num_rows;
                        //echo "El número de elementos es ".$numfilas;

                        for ($x=0;$x<$numfilas;$x++) {
                            $fila = $result->fetch_object();
                            echo "<tr>";
                            echo "<td>" .$fila->Nombre."</td>";
                            echo "<td>" .$fila->Grupo."</td>";
                            echo "<td>" .$fila->Correo."</td>";
                            echo "</tr>";
                        }

                        $result->free();
                        $db->close();*/
            ?>      
    </body>
</html>