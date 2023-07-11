<?php
//archivo para iniciar la conexión con la BBDD
$host = "localhost";
$usuario = "root";
$password = "";
$bd = "ejercicio_final";

$mysqli = new mysqli($host, $usuario, $password, $bd);
    if ($mysqli->connect_errno) {
        echo "Error en la conexión";
    }
?>