<?php
//variable donde se recoge el último componente del nombre de una ruta y se le añade .php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios de Programación Web</title>

    <link rel="icon" type="image/x-icon" href="../../favicon.ico">
    <link rel="stylesheet" href="../../css/estilos.css">
</head>

<body>
    <header>
        <nav class="div_menu">
            <!--la condición ternaria, modifica la clase del span para indicar si está o no activa la página-->
            <span class="boton <?= ($activePage == 'index') ? 'active':''; ?>">
                <a href="../../index.php">Portada</a>
            </span>
            <span class="boton <?= ($activePage == 'noticias') ? 'active':''; ?>">
                <a href="../noticias/noticias.php" >Noticias</a>
            </span>
            <span class="boton <?= ($activePage == 'registro') ? 'active':''; ?>">
                <a href="../registro/registro.php">Registro</a>
            </span>
            <span class="boton <?= ($activePage == 'login') ? 'active':''; ?>">
                <a href="../login/login.php">Inicio de Sesión</a>
            </span>
        </nav>
    </header>