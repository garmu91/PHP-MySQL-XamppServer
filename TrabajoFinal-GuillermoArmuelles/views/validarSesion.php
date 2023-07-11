<?php
    //archivo para modificar la barra de navegación de acuerdo al rol
    if (!isset($_SESSION["valida"])) {
        include("../header/header.php");
    } elseif ($_SESSION["rol"]=="admin"){
        include("../header/headerAdmin.php");
    } elseif($_SESSION["rol"]=="user"){
        include("../header/headerUser.php");   
    }
?>