<?php
      $servername = "localhost:3306";
      $username = "root";
      $password = "";
      $database = "agenda_escolar";
  
      $conexion = new mysqli($servername, $username, $password, $database);
              
      if($conexion->connect_error){
          die('Error de Conexion ('.$database->connect_error.')'.$database->connect_error);
      }

    $nombres =$_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if($password1 === $password2){
        $query = "INSERT INTO usuarios (id, nombres, apellidos, pass fotos, datos) VALUES (NULL, '$nombres', '$apellidos','$password1' , '', '';";

        if (mysqli_query($conexion, $query)) {
          /*Si se hace la inserccion correctamente, se redirige al loging*/
            echo "Registrado exitosamente";
            echo "<center><a href='../index.html' style='width: 70%; height:50px; background:#85CDE8;'>Iniciar sesion</a></center>";
        }
    }else{
        echo "Las contraseñas no coinciden";
    }
?>