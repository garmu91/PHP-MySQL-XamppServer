<?php

//variables que recogen por POST los datos personales enviados a través del formulario y filtran los datos introducidos
$nombre = htmlspecialchars ($_POST["nombre"], ENT_QUOTES, "UTF-8");
$apellidos = htmlspecialchars ($_POST["apellidos"], ENT_QUOTES, "UTF-8");
$email = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
$telefono = htmlspecialchars ($_POST["telefono"], ENT_QUOTES, "UTF-8");
$fnac = htmlspecialchars ($_POST["fnac"], ENT_QUOTES, "UTF-8");
$direccion = htmlspecialchars ($_POST["direccion"], ENT_QUOTES, "UTF-8");
$sexo = filter_input(INPUT_POST, 'sexo', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

//variables que recogen los datos de inicio de sesión
$usuario = htmlspecialchars ($_POST["usuario"], ENT_QUOTES, "UTF-8");
$pass = htmlspecialchars ($_POST["pass"], ENT_QUOTES, "UTF-8");

?>