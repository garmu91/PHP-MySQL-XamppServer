<?php include "../header/header.php" ?>

<?php
//variables que recogen datos de la URL y sanitizan los datos recogidos
$usuario = filter_input(INPUT_GET, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pass = filter_input(INPUT_GET, 'pass', FILTER_DEFAULT);

//mensajes de validación
$error1 = "El campo Usuario no puede estar vacío";
$error2 = "El campo Contraseña no puede estar vacío";
?>

    <div class="enlace-registro">
        <p>En caso de no estar registrado, haz clic aquí</p>
        <a href="../registro/registro.php">Registrarse</a>
    </div>

    <div class="container">
        <form action="./validarLogin.php" method="POST">
        <fieldset>
            <legend>Datos de inicio de sesión</legend>
                <ul class="flex-outer">
                    <li>
                        <!--en el campo "value" si el valor de la variable es true(1), no devuelve nada. En otro caso, devuelve el valor almacenado en la variable-->
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" 
                            placeholder="Escriba su usuario" 
                            value="<?php echo($usuario==1)?"":$usuario ?>">
                    </li>
                    <!--span para insertar el mensaje de validación-->
                    <span><?php echo ($usuario==1)?$error1:"" ?></span>
                    <li>
                        <!--en el campo "value" no devuelve nada por seguridad-->
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass" 
                            placeholder="Escriba su contraseña">
                    </li>
                    <span><?php echo ($pass==1)?$error2:"" ?></span>
                    <li class="liButtons">
                        <button type="reset">Borrar</button>
                        <button type="submit" name="iniciar">Iniciar sesión</button>
                    </li>
                </ul>
        </fieldset>
        </form>
    </div>
    
<?php include "../footer.php" ?>