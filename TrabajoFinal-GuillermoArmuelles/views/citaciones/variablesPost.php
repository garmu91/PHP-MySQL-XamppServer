<?php

//variables que recogen por POST los datos personales enviados a través del formulario y filtran los datos introducidos
$idUser = filter_input(INPUT_POST, 'idUser', FILTER_SANITIZE_NUMBER_INT);
$fcita = htmlspecialchars ($_POST["fcita"], ENT_QUOTES, "UTF-8");
$motivo = htmlspecialchars ($_POST["motivo"], ENT_QUOTES, "UTF-8");

?>