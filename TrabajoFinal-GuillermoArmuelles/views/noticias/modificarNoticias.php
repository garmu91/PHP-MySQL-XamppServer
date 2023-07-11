<?php include("../denegaciones/denegacionUser.php"); ?>

<?php
    //archivo para modificar los registros de la tabla "noticias"

    include("../conexionBBDD.php");

    include("variablesPostMod.php");

    if (!empty($modtitulo)) {
        
        //modificamos en la tabla "noticias" todos los campos de acuerdo a los valores de las variables, donde el campo "idNoticia" sea igual al valor de la variable $modidNoticia
        $sentencia = "UPDATE `noticias` SET ";
        $sentencia.= " `titulo` = '".$modtitulo."', ";
        $sentencia.= " imagen = '".$modfoto."', ";
        $sentencia.= " texto = '".$modtexto."', ";
        $sentencia.= " fecha = '".$modfecha."', ";
        $sentencia.= " idUser = '".$_SESSION["idUser"]."' ";
        $sentencia.= " WHERE idNoticia = '".$modidNoticia."'";

        $actualizar = $mysqli->query($sentencia);
        if ($actualizar == true) {
            echo "<h3>El registro ha sido actualizado en la BBDD<h3>";
            header('Refresh:1; url=noticias-administracion.php');
        } else {
            echo "Algo salió mal";
        }
    }
$mysqli->close();
?>