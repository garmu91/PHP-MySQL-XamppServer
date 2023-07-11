<?php
    //archivo para insertar los datos del formulario de citaciones.php en la BBDD

    include("../conexionBBDD.php");

    include("./variablesPost.php");

    //si los campos que son NOT NULL en la BBDD no están vacíos 
    if (!empty($fcita) && !empty($idUser)) {

            //se hace una consulta concatenada para insertar los datos dentro de las variables POST en la tabla citas
            $sql2 = "INSERT INTO citas ";
            $sql2.= " (idUser, fecha_cita, motivo_cita)";
            $sql2.= " VALUES";
            $sql2.= " ('".$idUser."', ";
            $sql2.= "'".$fcita."', ";
            $sql2.= "'".$motivo."')";

            $insertar_uno = $mysqli->query($sql2);

            //si la inserción sale bien

            if ($insertar_uno == true) {
                //redirige a citaciones.php y muestra mensaje de confirmación
                header('Refresh: 1; URL=./citaciones.php');
                echo '<h3>Captura realizada correctamente!...Redirigiendo<h3>';
            } else{
                echo 'Error de registro';
            }
    } else {
        //para validar que los campos del formulario no estén vacíos y para devolver los valores ya escritos en caso de error

        $errores = [false,false];

        if(empty($fcita)){
            $errores[0]=true;
        }else{
            $errores[0]=$fcita;
        }
        if(!empty($motivo)){
            //el campo Motivo de la cita puede ser NULL en la BBDD
            $errores[1]=urlencode($motivo);
        }
        header('Refresh:0; url=citaciones.php?fcita='.$errores[0].'&motivo='.$errores[1]);
    }
$mysqli->close();
?>