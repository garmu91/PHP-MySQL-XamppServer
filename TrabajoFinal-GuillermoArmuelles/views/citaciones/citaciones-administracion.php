<?php include("../denegaciones/denegacionUser.php"); ?>

<?php include("../validarSesion.php"); ?>

    <?php include("./listaUsuarios.php"); ?>

    <?php include("../conexionBBDD.php"); ?>

    <?php 
    //variables que recogen de la URL los datos  y sanitizan los datos recogidos
    $idcrearCita = filter_input(INPUT_GET, 'idcrearCita', FILTER_SANITIZE_NUMBER_INT);
    $fcita = filter_input(INPUT_GET, 'fcita', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $motivo = urldecode(filter_input(INPUT_GET, 'motivo', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $idVacio = filter_input(INPUT_GET, 'idVacio', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    ?>

    <?php
    //mensaje de validación
    $err1 = "El campo Fecha de cita no puede estar vacío";
    $err2 = "Se debe elegir un usuario";
    ?>

    <div class="container">
        <form action="./crearCitasAdmin.php" method="post">
        <fieldset>
            <legend> Crear citas para el usuario <?php echo ($idVacio==null)?$idcrearCita:$idVacio ?> </legend>
            <!--span para insertar el mensaje de validación-->
            <span><?php echo ($idVacio=="0")?$err2:"" ?></span>
                <ul class="flex-outer">
                    <input type="hidden" name="idUser" value="<?php echo ($idVacio==null)?$idcrearCita:$idVacio ?>">
                    <!--en el campo "value" si el valor de la variable es true(1), no devuelve nada. En otro caso, devuelve el valor almacenado en la variable-->
                    <li>
                        <label for="fcita">Fecha de cita</label>
                        <input type="date" name="fcita" 
                            placeholder="Elija la fecha de su cita"
                            value="<?php echo($fcita==1)?"":$fcita ?>"
                            title="Elija la fecha de su cita"
                            min="<?php echo date("Y-m-d"); ?>" >
                    </li>
                    <span><?php echo ($fcita==1)?$err1:"" ?></span>
                    <li>
                        <label for="motivo">Motivo de la cita</label>
                        <textarea name="motivo" rows="15"><?php echo $motivo=$motivo ?></textarea>
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
    $idverCita = filter_input(INPUT_GET, 'idverCita', FILTER_SANITIZE_NUMBER_INT);
    $modfcita = filter_input(INPUT_GET, 'modfcita', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $modmotivo = urldecode(filter_input(INPUT_GET, 'modmotivo', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    ?>

    <?php
    //mensaje de validación
    $err1 = "El campo Fecha de cita no puede estar vacío";
    ?>

    <div class="principal">
    <?php
        //para ver las citas en la página del administrador

        //consulta para buscar las citas donde el "idUser" de la tabla "citas" coincide con el "idUser" de la variable
        $result = $mysqli -> query("SELECT * FROM citas WHERE idUser = '".$idverCita."' ORDER BY fecha_cita ASC");

        if(!$result -> num_rows){
            echo "No hay registro de citas para este usuario";
        } else {
            //se guardan los datos dentro de un array
            while($qry = $result -> fetch_array()){
    ?>
            <form action="./modificarCitasAdmin.php" method="post">
            <fieldset>
                <legend> Citas del usuario <?php echo $qry["idUser"] ?> </legend>
                    <ul class="flex-outer-citas">
                        <input type="hidden" name="modidUser" value="<?php echo $qry["idUser"] ?>">
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
                        <span><?php echo ($modfcita==1)?$err1:"" ?></span>
                        <li>
                            <label for="modmotivo">Motivo de la cita</label>
                            <textarea name="modmotivo" rows="15"><?php echo $qry["motivo_cita"] ?></textarea>
                        </li>
                        <li class="liButtons">
                            <a href="./borrarCitasAdmin.php?idCita=.<?php echo ($qry['idCita']) ?>.&fcita=.<?php echo ($qry['fecha_cita']) ?>"> Borrar cita </a>
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