<?php

//variables que recogen los datos personales enviados a modificarUsuarios.php
$modnombre = htmlspecialchars ($_POST["modnombre"], ENT_QUOTES, "UTF-8");
$modapellidos = htmlspecialchars ($_POST["modapellidos"], ENT_QUOTES, "UTF-8");
$modemail = filter_input(INPUT_POST,"modemail",FILTER_VALIDATE_EMAIL);
$modtelefono = htmlspecialchars ($_POST["modtelefono"], ENT_QUOTES, "UTF-8");
$modfnac = htmlspecialchars ($_POST["modfnac"], ENT_QUOTES, "UTF-8");
$moddireccion = htmlspecialchars ($_POST["moddireccion"], ENT_QUOTES, "UTF-8");
$modsexo = filter_input(INPUT_POST, 'modsexo', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

//variables que recogen los datos de inicio de sesión
$modusuario = htmlspecialchars ($_POST["modusuario"], ENT_QUOTES, "UTF-8");
$modpass = htmlspecialchars ($_POST["modpass"], ENT_QUOTES, "UTF-8");
$modroles = filter_input(INPUT_POST, 'modroles', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$modidUser = filter_input(INPUT_POST, 'modidUser', FILTER_SANITIZE_NUMBER_INT);
$modidLogin = filter_input(INPUT_POST, 'modidLogin', FILTER_SANITIZE_NUMBER_INT);

?>