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
                echo "<materia data-id='" . $tareas[$j][0] . "'> <input type='checkbox' data-id='" . $tareas[$j][0] . "'/><a href='" . $tareas[$j][3] . "' target='_blank' rel='noopener noreferrer' style='color: #111111'>" . $tareas[$j][2] . "</a></materia>";
                
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
    imprimirFilaMateria('agenda 6ampr', 'normal')
?>