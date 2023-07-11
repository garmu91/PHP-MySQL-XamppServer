<?php

//variables que recogen los datos de la noticia enviados a crearNoticias.php
$titulo = htmlspecialchars ($_POST["titulo"], ENT_QUOTES, "UTF-8");
$fechaPubli = htmlspecialchars ($_POST["fechaPubli"], ENT_QUOTES, "UTF-8");
$texto = htmlspecialchars ($_POST["texto"], ENT_QUOTES, "UTF-8");
$foto = htmlspecialchars ($_POST["foto"], ENT_QUOTES, "UTF-8");
$nombre = htmlspecialchars ($_POST["nombre"], ENT_QUOTES, "UTF-8");

?>