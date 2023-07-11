<?php include("../denegaciones/denegacionUser.php"); ?>

<?php
    //archivo para borrar las noticias de la BBDD

    include("../conexionBBDD.php");

    //recoge de la URL y sanitiza el valor del campo 'idNoticia'
    $boridNoticia = filter_input(INPUT_GET, 'idNoticia', FILTER_SANITIZE_NUMBER_INT);

    //si no está vacía la variable
    if (!empty($boridNoticia)) {
        
        //consulta para borrar de la tabla "noticias" el registro donde el campo "idNoticia" sea igual al valor de la variable $boridNoticia
        $consulta = "DELETE FROM `noticias` WHERE ";
        $consulta.= " `idNoticia` = '".$boridNoticia."'";

        $borrar = $mysqli->query($consulta);
        if ($borrar == true) {
            echo "<h3>El registro ha sido borrado de la BBDD<h3>";
            header('Refresh:1; url=noticias-administracion.php');
        } else {
            echo "Algo salió mal";
        }
    }
$mysqli->close();
?>