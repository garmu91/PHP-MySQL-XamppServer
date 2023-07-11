<?php include("../denegaciones/denegacionUser.php"); ?>

<?php
    //archivo para modificar los registros de las tablas "users_data" y "users_login"

    include("../conexionBBDD.php");

    include("../variablesPostMod.php");

    if (!empty($modusuario)) {

        $verEmail = $mysqli -> query("SELECT * FROM `users_data` WHERE `email` = '".$modemail."' AND `idUser` != '".$modidUser."'");

        if($verEmail -> num_rows > 0) {
            echo "<h3> El correo ha sido registrado anteriormente <h3>";
            header('Refresh:2; url=usuarios-administracion.php');
        } else {

            $verUsuario = $mysqli -> query("SELECT * FROM `users_login` WHERE `usuario` = '".$modusuario."' AND `idUser` != '".$modidUser."'");

            if($verUsuario -> num_rows > 0) {
                echo "<h3> El usuario ha sido registrado anteriormente <h3>";
                header('Refresh:2; url=usuarios-administracion.php');
            } else {

                foreach($modsexo as $modsexoStr) {
                    $modsexoStr = mysqli_real_escape_string($mysqli, $modsexoStr);
                }
                
                //modificamos en la tabla "users_data" todos los campos de acuerdo a los valores de las variables, donde el campo "idUser" sea igual al valor de la variable $modidUser
                $sentencia = "UPDATE users_data SET ";
                $sentencia.= " nombre = '".$modnombre."', ";
                $sentencia.= " apellidos = '".$modapellidos."', ";
                $sentencia.= " email = '".$modemail."', ";
                $sentencia.= " telefono = '".$modtelefono."', ";
                $sentencia.= " fNac = '".$modfnac."', ";
                $sentencia.= " direccion = '".$moddireccion."', ";
                $sentencia.= " sexo = '".$modsexoStr."' ";
                $sentencia.= " WHERE idUser = '".$modidUser."'";

                $modificar = $mysqli->query($sentencia);
                if ($modificar == true) {

                    foreach($modroles as $modrolesStr) {
                        $modrolesStr = mysqli_real_escape_string($mysqli, $modrolesStr);
                    }

                    $rs = $mysqli->query("SELECT * FROM `users_login` WHERE `idLogin` = '".$modidLogin."'");

                    if ($rs -> num_rows > 0) {
                        $fila = $rs -> fetch_assoc();
                            if ($modpass == $fila['password']) {

                                //consulta concatenada para modificar los datos de inicio de sesión en la tabla "users_login" 
                                $sentencia2 = "UPDATE users_login SET ";
                                $sentencia2.= " usuario = '".$modusuario."', ";
                                $sentencia2.= " rol = '".$modrolesStr."' ";
                                $sentencia2.= " WHERE idLogin = '".$modidLogin."'";

                                $modificar_dos = $mysqli->query($sentencia2);

                            } else {
                                //para encriptar con BCRYPT
                                $cryptPass = password_hash($modpass, PASSWORD_BCRYPT);

                                $sentencia2 = "UPDATE users_login SET ";
                                $sentencia2.= " usuario = '".$modusuario."', ";
                                $sentencia2.= " password = '".$cryptPass."', ";
                                $sentencia2.= " rol = '".$modrolesStr."' ";
                                $sentencia2.= " WHERE idLogin = '".$modidLogin."'";

                                $modificar_dos = $mysqli->query($sentencia2);
                            }
                    }
                }
                //si la 2nda inserción sale bien
                if ($modificar_dos == true) {
                    echo "<h3>El registro ha sido modificado en la BBDD<h3>";
                    header('Refresh:1; url=usuarios-administracion.php');
                } else {
                    echo "Algo salió mal";
                }
            }
        }
    }
$mysqli->close();
?>