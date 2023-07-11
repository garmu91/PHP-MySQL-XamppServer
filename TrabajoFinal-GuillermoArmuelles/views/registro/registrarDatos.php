<?php
    //archivo para insertar los datos del formulario de registro.php en la BBDD

    include("../conexionBBDD.php");

    include("variablesPost.php");

    //si los campos que son NOT NULL en la BBDD no están vacíos 
    if (!empty($nombre) && !empty($apellidos) && !empty($email) && !empty($telefono) && !empty($fnac) && !empty($usuario) && !empty($pass)) {

            //recorremos el array del campo "Sexo" para insertar en la BBDD
            foreach($sexo as $sexoStr) {
            //mysqli_real_escape_string se usa para crear una cadena SQL legal que se puede usar en una sentencia SQL
            $sexoStr = mysqli_real_escape_string($mysqli, $sexoStr);
            }

            //se hace una consulta concatenada para insertar los datos dentro de las variables POST en la tabla users_data 
            $sql2 = "INSERT INTO users_data ";
            $sql2.= " (nombre, apellidos, email, telefono, fNac, direccion, sexo)";
            $sql2.= " VALUES";
            $sql2.= " ('".$nombre."', ";
            $sql2.= "'".$apellidos."', ";
            $sql2.= "'".$email."', ";
            $sql2.= "'".$telefono."', ";
            $sql2.= "'".$fnac."', ";
            $sql2.= "'".$direccion."', ";
            $sql2.= "'".$sexoStr."')";

            $insertar_uno = $mysqli->query($sql2);

            //si la 1era inserción sale bien
            if ($insertar_uno == true) {
                //se recoge dentro de la variable idUser el último id generado en la tabla users_data
                $idUser = $mysqli->insert_id;

                //para encriptar con BCRYPT
                $pass = password_hash($_POST["pass"], PASSWORD_BCRYPT);

                //consulta concatenada para insertar los datos de inicio de sesión en la tabla users_login 
                $sql3 = "INSERT INTO users_login ";
                $sql3.= " (idUser, usuario, password, rol)";
                $sql3.= " VALUES";
                $sql3.= " ('".$idUser."', ";
                $sql3.= "'".$usuario."', ";
                $sql3.= "'".$pass."', ";
                $sql3.= "'user')";

                $insertar_dos = $mysqli->query($sql3);
            }

            //si la 2nda inserción sale bien
            if ($insertar_dos == true) {
                //redirige a login.php y muestra mensaje de confirmación
                header('Refresh: 1; URL=../login/login.php');
                echo '<h3>Captura realizada correctamente!...Redirigiendo<h3>';
            } else{
                echo 'Error de registro';
            }
    } else {
        include ("validarVacios.php");
    }
$mysqli->close();
?>