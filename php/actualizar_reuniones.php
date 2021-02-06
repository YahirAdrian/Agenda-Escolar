<style>
    @import url('../css/mensajes.css');
</style>

<?php
    require('abrir_conexion.php');
    $inicio_materia_a = $_POST['inicio_materia_a'];   
    $fin_materia_a = $_POST['fin_materia_a'];
    $inicio_materia_b = $_POST['inicio_materia_b'];
    $fin_materia_b = $_POST['fin_materia_b'];
    $inicio_materia_c = $_POST['inicio_materia_c'];
    $fin_materia_c = $_POST['fin_materia_c'];
    $inicio_materia_d = $_POST['inicio_materia_d'];
    $fin_materia_d = $_POST['fin_materia_d'];
    $inicio_materia_e = $_POST['inicio_materia_e'];   
    $fin_materia_e = $_POST['fin_materia_e'];
    $inicio_materia_f = $_POST['inicio_materia_e'];   
    $fin_materia_f = $_POST['fin_materia_f'];
    
    $consulta_materia_a = "UPDATE reuniones SET hora_inicio = '$inicio_materia_a', hora_fin = '$fin_materia_a' WHERE materia = 'materia A'";
    $consulta_materia_b = "UPDATE reuniones SET hora_inicio = '$inicio_materia_b', hora_fin = '$fin_materia_b' WHERE materia = 'materia B'";
    $consulta_materia_c = "UPDATE reuniones SET hora_inicio = '$inicio_materia_c', hora_fin = '$fin_materia_c' WHERE materia = 'materia C'";
    $consulta_materia_d = "UPDATE reuniones SET hora_inicio = '$inicio_materia_d', hora_fin = '$fin_materia_d' WHERE materia = 'materia D'";
    $consulta_materia_e = "UPDATE reuniones SET hora_inicio = '$inicio_materia_e', hora_fin = '$fin_materia_e' WHERE materia = 'materia E'";
    $consulta_materia_f = "UPDATE reuniones SET hora_inicio = '$inicio_materia_f', hora_fin = '$fin_materia_f' WHERE materia = 'materia F'";

    //realizar las consultas
    $conexion->query($consulta_materia_a);    
    $conexion->query($consulta_materia_b);
    $conexion->query($consulta_materia_c);
    $conexion->query($consulta_materia_d);
    $conexion->query($consulta_materia_e);
    $conexion->query($consulta_materia_f);   
    
    echo "
            <div class='mensaje'>
                <img src='../src/icons/cheque.png' alt='check'/>
                <p class='texto-mensaje'> Actualizado exitosamente </p>
            </div>
        ";
        echo "<script> setTimeout(()=> window.location = '../admin.php', 1200);</script>";
?>