<?php
    //archivo para denegar acceso a personas no autorizadas
    session_start();

    //si la sesión no está activa o es nula: muestra el alert, redirige y termina el script    
    if (!isset($_SESSION["valida"]) || $_SESSION["valida"] == null ) {
        echo '<script> alert("Sesión no iniciada");
        location.href = "../login/login.php";
        </script>';
        die();
    }
    //si el "rol" de la sesión es igual a "user": muestra el alert, redirige y termina el script
    if ($_SESSION["rol"]=="user"){
        echo '<script> alert("Debes entrar como administrador");
        location.href = "../../index.php";
        </script>';
        die();
    }
?>