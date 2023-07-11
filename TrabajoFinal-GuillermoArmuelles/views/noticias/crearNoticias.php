<?php include("../denegaciones/denegacionUser.php"); ?>

<?php
    //archivo para insertar los datos del formulario de noticias-administracion.php en la BBDD

    include("../conexionBBDD.php");

    include("variablesPost.php");

    //si los campos que son NOT NULL en la BBDD no están vacíos
    if (!empty($titulo) && !empty($fechaPubli) && !empty($texto) && !empty($foto) && !empty($nombre)) {

        //verifica que el título no esté registrado actualmente en la BBDD
        $sql = "SELECT * FROM `noticias` WHERE 1";
        $sql.= " AND `titulo` = '".$titulo."'";

        $rs = $mysqli->query($sql);
        if ($rs -> num_rows > 0) {
            //muestra mensaje de validación y envía a través de la URL el valor de la variable $texto para no tener que escribirla nuevamente
            echo "<h3>El campo Título ha sido registrado anteriormente en la BBDD<h3>";
            header('Refresh:1; url=noticias-administracion.php?texto='.urlencode($texto));
        }
            //se hace una consulta concatenada para insertar los datos en la tabla noticias 
            $sql2 = "INSERT INTO noticias ";
            $sql2.= " (titulo, imagen, texto, fecha, idUser)";
            $sql2.= " VALUES";
            $sql2.= " ('".$titulo."', ";
            $sql2.= "'".$foto."', ";
            $sql2.= "'".$texto."', ";
            $sql2.= "'".$fechaPubli."', ";
            $sql2.= "'".$_SESSION["idUser"]."')";

            $insertar_uno = $mysqli->query($sql2);

            //si la inserción sale bien
            if ($insertar_uno == true) {
                //redirige a noticias-administracion.php y muestra mensaje de confirmación
                header('Refresh: 1; URL=./noticias-administracion.php');
                echo '<h3>Captura realizada correctamente!...Redirigiendo<h3>';
            } else{
                echo 'Error de registro';
            }
    //si alguno de los campos NOT NULL está vacío, ejecuta el archivo para validar campos vacíos
    } else {
        include ("validarVacios.php");
    }
$mysqli->close();
?>