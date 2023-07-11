<?php
//variables que recogen de la URL los datos del formulario noticias-administracion.php y sanitizan los datos recogidos
//urldecode decodifica una cadena cifrada como URL
$titulo = urldecode(filter_input(INPUT_GET, 'titulo', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$fechaPubli = filter_input(INPUT_GET, 'fechaPubli', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$texto = urldecode(filter_input(INPUT_GET, "texto", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$foto = urldecode(filter_input(INPUT_GET, 'foto', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$nombre = urldecode(filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

?>