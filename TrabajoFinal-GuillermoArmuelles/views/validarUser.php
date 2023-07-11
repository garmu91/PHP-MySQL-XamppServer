<?php
//archivo para validar que el valor del campo Usuario no esté registrado actualmente en la BBDD
include("./conexionBBDD.php");

$usuario = htmlspecialchars($_POST["usuario"], ENT_QUOTES, "UTF-8");

//se seleccionan todos los registros de la tabla "users_login" donde el campo "usuario" sea igual al valor de la variable "$usuario"
$sql = "SELECT * FROM `users_login` WHERE 1";
$sql.= " AND `usuario` = '".$usuario."'";

//se realiza la consulta
$rs = $mysqli->query($sql);
    //si el resultado de la consulta trae 1 fila o más
    if ($rs -> num_rows > 0) {
        //devuelve 2
        echo 2;
    } else {
        //si la consulta no devuelve ninguna fila, devuelve 3
        echo 3;
    }
//cerramos la conexión con la BBDD
$mysqli->close();
?>