<?php include "../header/header.php" ?>

<?php include "./variablesGet.php" ?>

<?php include "./msjError.php" ?>
    
    <div class="enlace-registro">
        <p>Si ya estás registrado, haz clic aquí</p>
        <a href="../login/login.php">Iniciar sesión</a>
    </div>

    <div class="container">
        <form action="./registrarDatos.php" method="post">
        <fieldset>
            <legend>Datos personales</legend>
                <ul class="flex-outer">
                    <li>
                        <!--en el campo "value" si el valor de la variable es true(1), no devuelve nada. En otro caso, devuelve el valor almacenado en la variable-->
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" 
                            placeholder="Escriba su nombre" value="<?php echo($nombre==1)?"":$nombre ?>"
                            title="Escriba sólo letras entre 3 y 15 caracteres">
                    </li>
                    <!--span para insertar el mensaje de validación-->
                    <span><?php echo ($nombre==1)?$err1:"" ?></span>
                    <li>
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" 
                            placeholder="Escriba sus apellidos" value="<?php echo($apellidos==1)?"":$apellidos ?>"
                            title="Escriba sólo letras entre 4 y 40 caracteres">
                    </li>
                    <span><?php echo ($apellidos==1)?$err2:"" ?></span>
                    <li>
                        <label for="email">Correo Electrónico</label>
                        <input type="email" name="email" id="email"
                            placeholder="Escriba su correo electrónico"
                            value="<?php echo($email==1)?"":$email ?>">
                    </li>
                    <span id="errorEmail"><?php echo ($email==1)?$err3:"" ?></span>
                    <li>
                        <label for="telefono">Teléfono</label>
                        <input type="tel" name="telefono" 
                            placeholder="Escriba su teléfono" value="<?php echo($telefono==1)?"":$telefono ?>"
                            title="Escriba los 9 números de su teléfono movil">
                    </li>
                    <span><?php echo ($telefono==1)?$err4:"" ?></span>
                    <li>
                        <label for="fnac">Fecha de nacimiento</label>
                        <input type="date" name="fnac" 
                            placeholder="Elija su fecha de nacimiento" value="<?php echo($fnac==1)?"":$fnac ?>"
                            title="Elija su fecha de nacimiento">
                    </li>
                    <span><?php echo ($fnac==1)?$err5:"" ?></span>
                    <li>
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" 
                            placeholder="Escriba su dirección" value="<?php echo($direccion=$direccion)?>" title="Escriba su dirección">
                    </li>
                    <li>
                        <p>Sexo</p>
                        <ul class="flex-inner">
                            <li>
                                <input type="radio" name="sexo[]" value="" 
                                <?php echo ($sexo=="")?"checked":"" ?>>
                                <label for="nulo"></label>
                            </li>
                            <li>
                                <input type="radio" name="sexo[]" value="mujer"
                                <?php echo ($sexo=="mujer")?"checked":"" ?>>
                                <label for="mujer">Mujer</label>
                            </li>
                            <li>
                                <input type="radio" name="sexo[]" value="hombre"
                                <?php echo ($sexo=="hombre")?"checked":"" ?>>
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
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" id="usuario"
                            placeholder="Escriba su usuario" 
                            value="<?php echo($usuario==1)?"":$usuario ?>">
                    </li>
                    <span id="errorUsuario"><?php echo ($usuario==1)?$err6:"" ?></span>
                    <li>
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass"
                            placeholder="Escriba su contraseña">
                    </li>
                    <span><?php echo ($pass==1)?$err7:"" ?></span>
                    <li class="liButtons">
                        <button type="reset">Borrar</button>
                        <button type="submit" id="botonSubmit"> Registrarse </button>
                    </li>
            </ul>
        </fieldset>
        </form>
    </div>

<script 
    src="https://code.jquery.com/jquery-3.6.3.js" 
    integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" 
    crossorigin="anonymous">
</script>

<script src="../../script/trabajoFinalPhp.js"></script>

<?php include "../footer.php" ?>