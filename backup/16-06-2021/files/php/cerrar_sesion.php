<?php
    session_start();
    setcookie("uid", "", time()-300, "/", "agendaescolar6ampr.000webhostapp.com");
    session_destroy();
    header('location: ../index.php');
?>