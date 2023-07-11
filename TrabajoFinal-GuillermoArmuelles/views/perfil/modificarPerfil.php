<?php
    session_start();
        
    if (!isset($_SESSION["valida"]) || $_SESSION["valida"] == null ) {
        echo '<script> alert("Sesión no iniciada");
        location.href = "../login/login.php";
        </script>';
        die();
    }
?>

<?php
    //archivo para modificar los registros de las tablas "users_data" y "users_login"

    include("../conexionBBDD.php");

    include("../variablesPostMod.php");


    if (!empty($modnombre) && !empty($modapellidos) && !empty($modemail) && !empty($modtelefono) && !empty($modfnac) && !empty($modusuario) && !empty($modpass)) {

        //consulta para verificar que el email no esté registrado con otro idUser
        $verEmail = $mysqli -> query("SELECT * FROM `users_data` WHERE `email` = '".$modemail."' AND `idUser` != '".$modidUser."'");

            if($verEmail -> num_rows > 0) {
                echo "<h3> El correo ha sido registrado anteriormente <h3>";
                header('Refresh:2; url=perfil.php');
            } else {

                foreach($modsexo as $modsexoStr) {
                    $modsexoStr = mysqli_real_escape_string($mysqli, $modsexoStr);
                }

                //se modifica en la tabla "users_data" todos los campos de acuerdo a los valores de las variables, donde el campo "idUser" sea igual al valor de la variable $modidUser
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

                    $rs = $mysqli->query("SELECT * FROM `users_login` WHERE `idLogin` = '".$modidLogin."'");

                    if ($rs -> num_rows > 0) {
                        $fila = $rs -> fetch_assoc();
                            if ($modpass == $fila['password']) {

                                //consulta concatenada para modificar los datos de inicio de sesión en la tabla "users_login"
                                $sentencia2 = "UPDATE users_login SET ";
                                $sentencia2.= " usuario = '".$modusuario."' ";
                                $sentencia2.= " WHERE idLogin = '".$modidLogin."'";

                                $modificar_dos = $mysqli->query($sentencia2);
                                
                            } else {
                                //para encriptar con BCRYPT
                                $cryptPass = password_hash($modpass, PASSWORD_BCRYPT);

                                $sentencia2 = "UPDATE users_login SET ";
                                $sentencia2.= " usuario = '".$modusuario."', ";
                                $sentencia2.= " password = '".$cryptPass."' ";
                                $sentencia2.= " WHERE idLogin = '".$modidLogin."'";

                                $modificar_dos = $mysqli->query($sentencia2);
                            }    
                    }
                            //si la 2nda inserción sale bien
                            if ($modificar_dos == true) {
                                echo "<h3>El registro ha sido modificado en la BBDD<h3>";
                                header('Refresh:1; url=perfil.php');
                            } else {
                                echo "Algo salió mal";
                            }
                }
            }
    } else {
        include ("./validarVacios.php");
    }
$mysqli->close();
?>