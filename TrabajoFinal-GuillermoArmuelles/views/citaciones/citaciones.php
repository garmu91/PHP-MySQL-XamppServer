<?php include("../denegaciones/denegacionAdmin.php"); ?>

<?php include("../validarSesion.php"); ?>

<?php include("../conexionBBDD.php"); ?>

    <?php 
    //variables que recogen de la URL los datos  y sanitizan los datos recogidos
    $fcita = filter_input(INPUT_GET, 'fcita', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $motivo = urldecode(filter_input(INPUT_GET, 'motivo', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    ?>

    <?php
    //mensaje de validación
    $err1 = "El campo Fecha de cita no puede estar vacío";
    ?>

    <div class="container">
        <form action="./crearCitasUser.php" method="post">
        <fieldset>
            <legend>Solicite su cita</legend>
                <ul class="flex-outer">
                    <input type="hidden" name="idUser" value="<?php echo ($_SESSION["idUser"]) ?>">
                    <!--en el campo "value" si el valor de la variable es true(1), no devuelve nada. En otro caso, devuelve el valor almacenado en la variable-->
                    <li>
                        <label for="fcita">Fecha de cita</label>
                        <input type="date" name="fcita" 
                            placeholder="Elija la fecha de su cita"
                            value="<?php echo($fcita==1)?"":$fcita ?>"
                            title="Elija la fecha de su cita"
                            min="<?php echo date("Y-m-d"); ?>" >
                    </li>
                    <!--span para insertar el mensaje de validación-->
                    <span><?php echo ($fcita==1)?$err1:"" ?></span>
                    <li>
                        <label for="motivo">Motivo de la cita</label>
                        <textarea name="motivo" rows="15"><?php echo($motivo=$motivo) ?></textarea>
                    </li>
                    <li class="liButtons">
                        <button type="reset">Borrar</button>
                        <button type="submit"> Crear cita </button>
                    </li>
                </ul>
        </fieldset>
        </form>
    </div>


    <?php 
    //variables que recogen de la URL los datos  y sanitizan los datos recogidos
    $modfcita = filter_input(INPUT_GET, 'modfcita', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $modmotivo = urldecode(filter_input(INPUT_GET, 'modmotivo', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    ?>

    <?php
    //mensaje de validación
    $err2 = "El campo Fecha de cita no puede estar vacío";
    ?>

    <div class="container-citas">
    <?php
    //archivo para mostrar las citas

    $result = $mysqli -> query("SELECT * FROM citas WHERE citas.idUser = '".$_SESSION["idUser"]."' ORDER BY idCita ASC");

    if(!$result -> num_rows){
        echo "No hay citas registradas";
    } else {
        while($qry = $result -> fetch_array()){
    ?>

        <form action="./modificarCitas.php" method="post">
        <fieldset>
            <legend>Modifique su cita</legend>
                <ul class="flex-outer-citas">
                    <input type="hidden" name="modidCita" value="<?php echo $qry["idCita"] ?>">
                    <!--en el campo "value" si el valor de la variable es true(1), no devuelve nada. En otro caso, devuelve el valor almacenado en la variable-->
                    <li>
                        <label for="modfcita">Fecha de cita</label>
                        <input type="date" name="modfcita" 
                            value="<?php echo $qry["fecha_cita"] ?>"
                            title="Elija la fecha de su cita"
                            min="<?php echo date("Y-m-d"); ?>" >
                    </li>
                    <!--span para insertar el mensaje de validación-->
                    <span><?php echo ($modfcita==1)?$err2:"" ?></span>
                    <li>
                        <label for="modmotivo">Motivo de la cita</label>
                        <textarea name="modmotivo" rows="15"><?php  echo ($modmotivo=="")?$qry["motivo_cita"]:$modmotivo ?></textarea>
                    </li>
                    <li class="liButtons">
                        <a href="./borrarCitas.php?idCita=.<?php echo ($qry['idCita']) ?>.&fcita=.<?php echo ($qry['fecha_cita']) ?>"> Borrar cita </a>
                        <button type="submit"> Modificar cita </button>
                    </li>
                </ul>
        </fieldset>
        </form>

    <?php
        }
    }
    $mysqli->close();
    ?>
    </div>

<?php include "../footer.php" ?>