<?php
    session_start();
        
    if (!isset($_SESSION["valida"]) || $_SESSION["valida"] == null ) {
        echo '<script> alert("Sesión no iniciada");
        location.href = "../validarLogin/login.php";
        </script>';
        die();
    }
?>

<?php include("../validarSesion.php"); ?>

    <?php include("./validarPerfil.php"); ?>

<?php include "../footer.php" ?>