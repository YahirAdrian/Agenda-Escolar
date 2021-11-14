<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notificaciones con php</title>
    </head>

    <body>
    <script src="js/push.min.js"></script>
        <?php

            
            echo ("<script>
            Push.create('Notificacion', {
                body: 'How is it hangin?',
                icon: 'src/horario.png',
                timeout: 10000,
                onClick: function () {
                    window.location = 'index.php';
                    this.close();
                }
            });

            </script>");
        ?>
        
        
    </body>
</html>