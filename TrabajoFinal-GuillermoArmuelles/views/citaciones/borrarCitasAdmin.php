<?php include("../denegaciones/denegacionUser.php"); ?>

<?php
    //archivo para borrar las citas de la BBDD

    include("../conexionBBDD.php");

    //recoge de la URL y sanitiza el valor del campo 'idCita'
    $boridCita = filter_input(INPUT_GET, 'idCita', FILTER_SANITIZE_NUMBER_INT);
    $borfcita = filter_input(INPUT_GET, 'fcita', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //si no está vacía la variable
    if (!empty($boridCita)) {

        if(strtotime($borfcita) < time()) {
            echo "<h3>La fecha de la cita ya pasó<h3>";
            header('Refresh:1; url=citaciones-administracion.php');
        } else {
        
            //consulta para borrar de la tabla "citas" el registro donde el campo "idCita" sea igual al valor de la variable $boridCita
            $consulta = "DELETE FROM `citas` WHERE ";
            $consulta.= " `idCita` = '".$boridCita."'";

            $borrar = $mysqli->query($consulta);
            if ($borrar == true) {
                echo "<h3>La cita ha sido borrada de la BBDD<h3>";
                header('Refresh:1; url=citaciones-administracion.php');
            } else {
                echo "Algo salió mal";
            }
        }
    }
$mysqli->close();
?>