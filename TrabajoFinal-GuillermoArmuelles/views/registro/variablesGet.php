<?php

//variables que recogen de la URL los datos personales y sanitizan los datos recogidos
$nombre = urldecode(filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$apellidos = urldecode(filter_input(INPUT_GET, 'apellidos', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$email = filter_input(INPUT_GET,'email',FILTER_SANITIZE_EMAIL);
$telefono = filter_input(INPUT_GET, 'telefono', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$fnac = filter_input(INPUT_GET, 'fnac', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$direccion = urldecode(filter_input(INPUT_GET, 'direccion', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$sexo = filter_input(INPUT_GET, 'sexo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//variables que recogen de la URL los datos de inicio de sesión
$usuario = urldecode(filter_input(INPUT_GET, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$pass = filter_input(INPUT_GET, 'pass', FILTER_DEFAULT);

?>