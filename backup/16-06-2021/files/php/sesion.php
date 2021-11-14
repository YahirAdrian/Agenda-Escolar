<?php session_start();?>
<?php
    require('abrir_conexion.php');
    $nombres = $_POST['nombre'];
    $pass_form = $_POST['password'];

    if($nombres == "admin" && $pass_form == "loremipsum_soy_admin"){
        
        $_SESSION["admin"] = "true";
        // echo "<script>window.location = '../admin.php';</script>";
        header("location: ../admin.php");
    }
    
    $consulta = "SELECT  id, nombres,  pass FROM usuarios WHERE nombres = '$nombres' AND pass = '$pass_form'; ";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        /* obtener el array asociativo */
        $fila = mysqli_fetch_row($resultado);
		
            $_SESSION["usuario"] = $fila[0];
		if(count($fila) >= 3){
		    if(isset($_POST["renember"])){
		        setcookie("uid", $_SESSION["usuario"], time()+60*60*24*7, "/", "agendaescolar6ampr.000webhostapp.com");
		        
		    }
            // header('location: ../inicio.php');
		    echo "
		    <head>
        		    <link rel='stylesheet' href='../css/network_status_style.css'/>
        		     <meta name='apple-mobile-web-app-capable' content='yes'>
                <meta name='apple-mobile-web-app-status-bar-style' content='#3F51B5'>
                <meta name='theme-color' content='#3F51B5'>
		    </head>
		    <script>
		        caches.delete('app-dynamic-v1')
            .then(respuesta=>{
                console.log(respuesta);
                mostrarSpinner();
                setTimeout(()=>window.location='../inicio.php', 350);
                
            })
            .catch(error=>console.log(error));
            
            function mostrarSpinner(){
                const spinner = document.createElement('div');
                const background = document.createElement('div');
                background.classList.add('background-spinner');
                spinner.classList.add('sk-chase');
                spinner.innerHTML = `
                    <div class='sk-chase-dot'></div>
                    <div class='sk-chase-dot'></div>
                    <div class='sk-chase-dot'></div>
                    <div class='sk-chase-dot'></div>
                    <div class='sk-chase-dot'></div>
                    <div class='sk-chase-dot'></div>
                `;
                
                const body = document.querySelector('body');
                body.appendChild(background);
                body.appendChild(spinner);
            }
            
		    </script>";

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
