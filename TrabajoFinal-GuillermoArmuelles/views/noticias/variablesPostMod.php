<?php

//variables que recogen los datos de la noticia enviados a modificarNoticias.php
$modtitulo = htmlspecialchars ($_POST["modtitulo"], ENT_QUOTES, "UTF-8");
$modfecha = htmlspecialchars ($_POST["modfecha"], ENT_QUOTES, "UTF-8");
$modtexto = htmlspecialchars ($_POST["modtexto"], ENT_QUOTES, "UTF-8");
$modfoto = htmlspecialchars ($_POST["modfoto"], ENT_QUOTES, "UTF-8");
$modnombre = htmlspecialchars ($_POST["modnombre"], ENT_QUOTES, "UTF-8");
$modidNoticia = filter_input(INPUT_POST, 'modidNoticia', FILTER_SANITIZE_NUMBER_INT);

?>