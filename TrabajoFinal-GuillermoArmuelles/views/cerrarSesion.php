<?php
    //archivo para cerrar la sesión
    if(isset($_GET["accion"])){
        session_unset();
        session_destroy();
        header('Refresh: 0; URL=../../index.php');
    }
?>