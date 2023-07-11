<?php include("../denegaciones/denegacionAdmin.php"); ?>

<?php
    //archivo para modificar los registros de la tabla "noticias"

    include("../conexionBBDD.php");

    include("./variablesPostMod.php");

    if (!empty($modfcita) && !empty($modidCita)) {

        if(strtotime($modfcita) < time()) {
            echo "<h3>La fecha de la cita ya pasó<h3>";
            header('Refresh:1; url=citaciones.php');
        } else {
            //modificamos en la tabla "citas" todos los campos de acuerdo a los valores de las variables, donde el campo "idCita" sea igual al valor de la variable $modidCita
            $sentencia = "UPDATE `citas` SET ";
            $sentencia.= " fecha_cita = '".$modfcita."', ";
            $sentencia.= " motivo_cita = '".$modmotivo."'";
            $sentencia.= " WHERE idCita = '".$modidCita."'";

            $actualizar = $mysqli->query($sentencia);
            if ($actualizar == true) {
                echo "<h3>La cita ha sido actualizada en la BBDD<h3>";
                header('Refresh:1; url=citaciones.php');
            } else {
                echo "Algo salió mal";
            }
        }   
    } else {
        //para validar que los campos del formulario no estén vacíos y para devolver los valores ya escritos en caso de error

        $errores = [false,false];

        if(empty($modfcita)){
            $errores[0]=true;
        }else{
            $errores[0]=$modfcita;
        }
        if(!empty($modmotivo)){
            $errores[1]=urlencode($modmotivo);
        }
        header('Refresh:0; url=citaciones.php?modfcita='.$errores[0].'&modmotivo='.$errores[1]);
    }
$mysqli->close();
?>