<?php include("../cerrarSesion.php"); ?>

<?php
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
            <span class="boton <?= ($activePage == 'index') ? 'active':''; ?>">
                <a href="../../index.php">Portada</a>
            </span>
            <span class="boton <?= ($activePage == 'noticias') ? 'active':''; ?>">
                <a href="../noticias/noticias.php" >Noticias</a>
            </span>
            <span class="boton <?= ($activePage == 'usuarios-administracion') ? 'active':''; ?>">
                <a href="../usuarios/usuarios-administracion.php">Administración de Usuarios</a>
            </span>
            <span class="boton <?= ($activePage == 'citaciones-administracion') ? 'active':''; ?>">
                <a href="../citaciones/citaciones-administracion.php">Administración de Citas</a>
            </span>
            <span class="boton <?= ($activePage == 'noticias-administracion') ? 'active':''; ?>">
                <a href="../noticias/noticias-administracion.php">Administración de Noticias</a>
            </span>
            <span class="boton <?= ($activePage == 'perfil') ? 'active':''; ?>">
                <a href="../perfil/perfil.php">Perfil</a>
            </span>
            <span>
                <a href="<?php echo $activePage;?>.php?accion=salir">Cerrar sesión</a>
            </span>
        </nav>
    </header>