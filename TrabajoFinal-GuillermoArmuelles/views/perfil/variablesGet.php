<?php

//variables que recogen de la URL los datos personales y sanitizan los datos recogidos
$modnombre = filter_input(INPUT_GET, 'modnombre', FILTER_VALIDATE_BOOLEAN);
$modapellidos = filter_input(INPUT_GET, 'modapellidos', FILTER_VALIDATE_BOOLEAN);
$modemail = filter_input(INPUT_GET,"modemail", FILTER_VALIDATE_BOOLEAN);
$modtelefono = filter_input(INPUT_GET, 'modtelefono', FILTER_VALIDATE_BOOLEAN);
$modfnac = filter_input(INPUT_GET, 'modfnac', FILTER_VALIDATE_BOOLEAN);

//variables que recogen de la URL los datos de inicio de sesión
$modusuario = filter_input(INPUT_GET, 'modusuario', FILTER_VALIDATE_BOOLEAN);
$modpass = filter_input(INPUT_GET, 'modpass', FILTER_VALIDATE_BOOLEAN);

?>