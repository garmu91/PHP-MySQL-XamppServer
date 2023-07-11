<?php include("../denegaciones/denegacionUser.php"); ?>

<?php
    //archivo para borrar los usuarios de la BBDD

    include("../conexionBBDD.php");

    //recoge de la URL y sanitiza el valor del campo 'idUser'
    $borUsuario = filter_input(INPUT_GET, 'idUser', FILTER_SANITIZE_NUMBER_INT);

    //si no está vacía la variable
    if (!empty($borUsuario)) {
        
        //consulta para borrar de la tabla "users_login" el registro donde el campo "idUser" sea igual al valor de la variable $borUsuario. Este registro debe borrarse primero ya que es clave foránea de la tabla "users_data"
        $consulta = "DELETE FROM `users_login` WHERE ";
        $consulta.= " `idUser` = '".$borUsuario."'";

        $borrar = $mysqli->query($consulta);
        //si el 1er borrado sale bien
        if ($borrar == true) {

            $consulta2 = "DELETE FROM `users_data` WHERE ";
            $consulta2.= " `idUser` = '".$borUsuario."'";

            $borrar2 = $mysqli->query($consulta2);

            if ($borrar2 == true) {
                echo "<h3>El registro ha sido borrado de la BBDD<h3>";
                header('Refresh:1; url=usuarios-administracion.php');
            } else {
            echo "Algo salió mal";
            }
        }
    }
$mysqli->close();
?>