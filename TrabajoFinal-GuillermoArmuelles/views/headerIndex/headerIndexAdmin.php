<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios de Programación Web</title>

    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link rel="stylesheet" href="./css/estilos.css">
</head>

<body>
    <header>
            <nav class="div_menu">
                <span class="boton active">
                    <a href="./index.php">Portada</a>
                </span>
                <span class="boton">
                    <a href="./views/noticias/noticias.php">Noticias</a>
                </span>
                <span class="boton">
                    <a href="./views/usuarios/usuarios-administracion.php">Administración de Usuarios</a>
                </span>
                <span class="boton">
                    <a href="./views/citaciones/citaciones-administracion.php">Administración de Citas</a>
                </span>
                <span class="boton">
                    <a href="./views/noticias/noticias-administracion.php">Administración de Noticias</a>
                </span>
                <span class="boton">
                    <a href="./views/perfil/perfil.php">Perfil</a>
                </span>
                <span>
                    <!--al hacer clic en el enlace, se envía la variable "accion" con valor "salir" a la misma página-->
                    <a href="./index.php?accion=salir">Cerrar sesión</a>
                </span>
            </nav>
    </header>