<?php

//variables que recogen por POST los datos personales enviados a través del formulario y filtran los datos introducidos
$modidCita = filter_input(INPUT_POST, 'modidCita', FILTER_SANITIZE_NUMBER_INT);
$modfcita = htmlspecialchars ($_POST["modfcita"], ENT_QUOTES, "UTF-8");
$modmotivo = htmlspecialchars ($_POST["modmotivo"], ENT_QUOTES, "UTF-8");

?>