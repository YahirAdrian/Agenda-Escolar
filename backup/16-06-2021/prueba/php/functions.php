<?php
    function mostrarAlerta($tipo, $mensaje, $primera_vez, $redireccion){
        if($primera_vez){
            echo "<style>
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
                </style>";
        }
        if($tipo == "error"){
            echo "
                <div class='mensaje'>
                    <img src='../src/icons/cerrar.png' alt='error'/>
                    <p class='texto-mensaje'> $mensaje </p>
                </div>
            ";
        }else{
            echo "
            <div class='mensaje'>
                <img src='../src/icons/cheque.png' alt='error'/>
                <p class='texto-mensaje'> $mensaje </p>
            </div>
            ";
        }
        
        if($redireccion){
            echo "<script>setTimeout(()=>window.location = '$redireccion', 2000);</script>";
        }
    }
?>