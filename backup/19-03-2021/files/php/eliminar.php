<?php
    session_start();
    require("functions.php");
    
    if($_SESSION["usuario"] == "admin"){
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            require("abrir_conexion.php");
            
            $resultado = $conexion->query("DELETE FROM tareas WHERE id = $id");
            if($resultado){
                mostrarAlerta("correcto", "Se eliminó correctamente", false, "../");
            }else{
                mostrarAlerta("error", "Hubo un error al realizar esta acción", true, "../");
            }
        }else{
            mostrarAlerta("error", "Debe de ingresar un parámetro", true, "../admin.php");
        }
    }else{
        mostrarAlerta("error", "usuario no autorizado para realizar esta accion", true, "../");
    }
?>

<meta charset = "utf-8">