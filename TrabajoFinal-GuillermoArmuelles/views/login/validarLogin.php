<?php
//archivo para validar los datos del formulario de login.php contra los datos de la BBDD

include("../conexionBBDD.php");

$usuario = htmlspecialchars ($_POST["usuario"], ENT_QUOTES, "UTF-8");
$pass = htmlspecialchars ($_POST["pass"], ENT_QUOTES, "UTF-8");

if (!empty($usuario) && !empty($pass)) {

    $sql = "SELECT * FROM `users_login` WHERE 1";
    $sql.= " AND `usuario` = '".$usuario."'";

    $rs = $mysqli->query($sql);

    //si la consulta trae al menos 1 fila
    if ($rs -> num_rows > 0) {
        //hace esto: password_verify compara el valor de la variable $pass con el valor de "password" asociado a la variable $fila
        while ($fila = $rs -> fetch_assoc()) {
            if (password_verify($pass, $fila["password"])) {
                //inicia la sesión
                session_start();
                $_SESSION ["valida"] = "si";
                $_SESSION["idUser"] = $fila["idUser"];
                $_SESSION["usuario"] = $fila["usuario"];
                $_SESSION["rol"] = $fila["rol"];
                header('Refresh: 1; URL=../../index.php');
                echo '<h3>Sesión iniciada correctamente!...Redirigiendo<h3>';
            } else {
                header('Refresh: 1; URL=./login.php');
                echo "<h3>Registro no encontrado<h3>";
            }
        }
    } else {
        header('Refresh: 1; URL=./login.php');
        echo "<h3>Registro no encontrado<h3>";
    }
} else {
    $errores = [false,false];

    if(empty($usuario)){
        $errores[0]=true;
    }else {
        $errores[0]=$usuario;
    }
    if(empty($pass)){
        $errores[1]=true;
    }else{
        $errores[1]=false;
    }
    header('Refresh:0; url=./login.php?usuario='.$errores[0].'&pass='.$errores[1]);
}
$mysqli->close();
?>