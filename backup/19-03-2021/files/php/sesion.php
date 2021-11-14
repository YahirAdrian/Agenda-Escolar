<?php session_start();?>
<?php
    require('abrir_conexion.php');
    $nombres = $_POST['nombre'];
    $pass_form = $_POST['password'];

    if($nombres == "admin" && $pass_form == "loremipsum_soy_admin"){
        
        $_SESSION["usuario"] = "admin";
        header("location: ../admin.php");
    }
    
    $consulta = "SELECT  id, nombres,  pass FROM usuarios WHERE nombres = '$nombres' AND pass = '$pass_form'; ";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        /* obtener el array asociativo */
        $fila = mysqli_fetch_row($resultado);
		
		if(count($fila) >= 3){
		    if(isset($_POST["renember"])){
		        setcookie("uid", $fila[0], time()+60*60*24*7, "/", "agendaescolar6ampr.000webhostapp.com");
		        
		    }
            $_SESSION["usuario"] = $fila[0];
            header('location: ../inicio.php');

		}else{
			echo "
            <div class='mensaje'>
                <img src='../src/icons/cerrar.png' alt='error'/>
                <p class='texto-mensaje'> Contraseña incorrecta </p>
            </div>
        ";

        echo "<script> setTimeout(()=> window.location = '../index.php', 2000);</script>";
		}
            
        /* liberar el conjunto de resultados */
        mysqli_free_result($resultado);
    }
    $conexion->close();
?>

<style>
    body{
        width: 100vw;
        height: 100vw;
        display: flex;
        justify-content: center;
    }

    .mensaje img{
        width: 400px;
        height: 400px;
    }

    .texto-mensaje{
        font-family: 'Nunito', sans-serif;
        font-size: 20px;
        text-align: center;
    }
</style>
