<?php

include("../conexionBBDD.php");

//se almacena en una variable el valor idUser de la variable global $_SESSION
$idUsuario = $_SESSION["idUser"];

//consulta para alamcenar en un array todos los campos de las tablas 'users_data' y 'users_login' donde coincida el valor del idUser
$result = $mysqli -> query("SELECT * FROM users_data JOIN users_login ON users_data.idUser = users_login.idUser AND users_login.idUser = '".$idUsuario."'");

if ($result -> num_rows > 0) {
    $perfil = $result -> fetch_array();
    }

?>

<?php include "./variablesGet.php" ?>

<?php include "./msjError.php" ?>

<div class="container">
    <form action="./modificarPerfil.php" method="post">
        <fieldset>
            <legend>Datos personales</legend>
                <ul class="flex-outer">
                    <li>
                        <!--en el campo "value" devuelve el valor almacenado en el array dentro de la variable $perfil-->
                        <label for="modnombre">Nombre</label>
                        <input type="text" name="modnombre" 
                            placeholder="Escriba su nombre"
                            value="<?php echo $perfil['nombre'] ?>"
                            title="Escriba sólo letras entre 3 y 15 caracteres">
                    </li>
                    <!--span para insertar el mensaje de validación-->
                    <span><?php echo ($modnombre==1)?$err1:"" ?></span>
                    <li>
                        <label for="modapellidos">Apellidos</label>
                        <input type="text" name="modapellidos" 
                            placeholder="Escriba sus apellidos"
                            value="<?php echo $perfil['apellidos'] ?>"
                            title="Escriba sólo letras entre 4 y 40 caracteres">
                    </li>
                    <span><?php echo ($modapellidos==1)?$err2:"" ?></span>
                    <li>
                        <label for="modemail">Correo Electrónico</label>
                        <input type="email" name="modemail"
                            placeholder="Escriba su correo electrónico"
                            value="<?php echo $perfil['email'] ?>">
                    </li>
                    <span><?php echo ($modemail==1)?$err3:"" ?></span>
                    <li>
                        <label for="modtelefono">Teléfono</label>
                        <input type="tel" name="modtelefono" 
                            placeholder="Escriba su teléfono"
                            value="<?php echo $perfil['telefono'] ?>"
                            title="Escriba los 9 números de su teléfono movil">
                    </li>
                    <span><?php echo ($modtelefono==1)?$err4:"" ?></span>
                    <li>
                        <label for="modfnac">Fecha de nacimiento</label>
                        <input type="date" name="modfnac" 
                            placeholder="Elija su fecha de nacimiento"
                            value="<?php echo $perfil['fNac'] ?>"
                            title="Elija su fecha de nacimiento">
                    </li>
                    <span><?php echo ($modfnac==1)?$err5:"" ?></span>
                    <li>
                        <label for="moddireccion">Dirección</label>
                        <input type="text" name="moddireccion" 
                            placeholder="Escriba su dirección" value="<?php echo $perfil['direccion'] ?>" 
                            title="Escriba su dirección">
                    </li>
                    <li>
                        <p>Sexo</p>
                        <ul class="flex-inner">
                            <li>
                                <input type="radio" name="modsexo[]" 
                                value="" <?php echo ($perfil['sexo']=="")?"checked":"" ?>>
                                <label for="nulo"></label>
                            </li>
                            <li>
                                <input type="radio" name="modsexo[]" 
                                value="mujer" <?php echo ($perfil['sexo']=="mujer")?"checked":"" ?>>
                                <label for="mujer">Mujer</label>
                            </li>
                            <li>
                                <input type="radio" name="modsexo[]" 
                                value="hombre" <?php echo ($perfil['sexo']=="hombre")?"checked":"" ?>>
                                <label for="hombre">Hombre</label>
                            </li>
                        </ul>
                    </li>
                </ul>
        </fieldset>
        <fieldset>
            <legend>Datos de inicio de sesión</legend>
            <ul class="flex-outer">
                    <li>
                        <label for="modusuario">Usuario</label>
                        <input type="text" name="modusuario"
                            placeholder="Escriba su usuario" 
                            value="<?php echo $perfil['usuario'] ?>" readonly>
                    </li>
                    <li>
                        <label for="modpass">Contraseña</label>
                        <input type="password" name="modpass"
                            placeholder="Escriba su contraseña"
                            value="<?php echo $perfil['password']?>">
                    </li>
                    <span><?php echo ($modpass==1)?$err6:"" ?></span>
                    
                    <!--se guarda en un campo oculto el valor de idUser, para luego enviarlo al archivo modificarPerfil.php al hacer clic en el botón "Modificar"-->
                    <input type="hidden" name="modidUser" value="<?php echo $perfil['idUser'] ?>">
                    <input type="hidden" name="modidLogin" value="<?php echo $perfil['idLogin'] ?>">

                    <li class="liButtons">
                        <button type="reset">Borrar</button>
                        <button type="submit"> Modificar </button>
                    </li>
            </ul>
        </fieldset>
    </form>
</div>

<?php
$mysqli->close();
?>