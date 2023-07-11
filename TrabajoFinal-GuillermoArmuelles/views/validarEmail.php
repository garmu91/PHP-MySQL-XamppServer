<?php
//archivo para validar que el valor del campo Correo electrónico no esté registrado actualmente en la BBDD
include("./conexionBBDD.php");

$email = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);

//guardamos la consulta en la variable $sql
$sql = "SELECT * FROM `users_data` WHERE 1";//se debe incluir el 1 dentro de la consulta
$sql.= " AND `email` = '".$email."'";

$rs = $mysqli->query($sql);
    if ($rs -> num_rows > 0) {
        //si existe un email que coincida dentro de la BBDD, devuelve un 0
        echo 0;
    } else {
        //en caso opuesto, cuando no devuelve ninguna row, devuelve 1
        echo 1;
    }
$mysqli->close();
?>