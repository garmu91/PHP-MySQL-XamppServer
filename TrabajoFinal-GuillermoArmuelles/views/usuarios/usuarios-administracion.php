<?php include("../denegaciones/denegacionUser.php"); ?>

<?php include("../validarSesion.php"); ?>

    <?php include "../registro/variablesGet.php" ?>

    <?php include "../registro/msjError.php" ?>

    <div class="container">
        <form action="./crearUsuarios.php" method="post">
        <fieldset>
            <legend>Crear usuario</legend>
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
                                <input type="radio" name="sexo[]" value="">
                                <label for="nulo"></label>
                            </li>
                            <li>
                                <input type="radio" name="sexo[]" value="mujer">
                                <label for="mujer">Mujer</label>
                            </li>
                            <li>
                                <input type="radio" name="sexo[]" value="hombre">
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
                    <li>
                    <label for="roles[]">Roles:</label>
                    <select name="roles[]">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    </li>
                    <li class="liButtons">
                        <button type="reset">Borrar</button>
                        <button type="submit" id="botonSubmit"> Crear Usuario </button>
                    </li>
            </ul>
        </fieldset>
        </form>
    </div>

    <?php include("../conexionBBDD.php"); ?>

    <?php include ("./verUsuarios.php"); ?>

    <?php include("../conexionBBDD.php"); ?>

    <?php
    //se recoge el valor de "idUser" de la URL, enviado al hacer clic en el botón "Modificar usuario"
    $idUser = filter_input(INPUT_GET, 'idUser', FILTER_SANITIZE_NUMBER_INT);
        
    if (!empty($idUser)) {
        
        $query = "SELECT * FROM users_data JOIN users_login ON users_data.idUser = users_login.idUser ";
        $query.= " AND users_login.idUser = '".$idUser."' ORDER BY idLogin DESC";

        //se guarda el resultado de la consulta en un array
        if ($resulta = $mysqli->query($query)) {
            if($resulta -> num_rows > 0) {
                $array = $resulta -> fetch_array();
            }
        } else {
            echo "El usuario no existe";
        }
        
    ?>
    <div class="container">
    <form action="./modificarUsuarios.php" method="post">
        <fieldset>
            <legend>Modificar usuario</legend>
                <ul class="flex-outer">
                    <li>
                        <label for="modnombre">Nombre</label>
                        <input type="text" name="modnombre" 
                            placeholder="Escriba su nombre" 
                            value="<?php echo $array['nombre']?>" autofocus>
                    </li>
                    <li>
                        <label for="modapellidos">Apellidos</label>
                        <input type="text" name="modapellidos" 
                            placeholder="Escriba sus apellidos" 
                            value="<?php echo $array['apellidos'] ?>">
                    </li>
                    <li>
                        <label for="modemail">Correo Electrónico</label>
                        <input type="email" name="modemail"
                            placeholder="Escriba su correo electrónico"
                            value="<?php echo $array['email'] ?>">
                    </li>
                    <li>
                        <label for="modtelefono">Teléfono</label>
                        <input type="tel" name="modtelefono" 
                            placeholder="Escriba su teléfono" 
                            value="<?php echo $array['telefono'] ?>">
                    </li>
                    <li>
                        <label for="modfnac">Fecha de nacimiento</label>
                        <input type="date" name="modfnac" 
                            placeholder="Elija su fecha de nacimiento" 
                            value="<?php echo $array['fNac'] ?>">
                    </li>
                    <li>
                        <label for="moddireccion">Dirección</label>
                        <input type="text" name="moddireccion" 
                            placeholder="Escriba su dirección" 
                            value="<?php echo $array['direccion'] ?>">
                    </li>
                    <li>
                        <p>Sexo</p>
                        <ul class="flex-inner">
                            <li>
                                <input type="radio" name="modsexo[]" value=""
                                <?php echo ($array['sexo']=="")?"checked":"" ?>>
                                <label for="nulo"></label>
                            </li>
                            <li>
                                <input type="radio" name="modsexo[]" value="mujer"
                                <?php echo ($array['sexo']=="mujer")?"checked":"" ?>>
                                <label for="mujer">Mujer</label>
                            </li>
                            <li>
                                <input type="radio" name="modsexo[]" value="hombre"
                                <?php echo ($array['sexo']=="hombre")?"checked":"" ?>>
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
                            value="<?php echo $array['usuario'] ?>">
                    </li>
                    <li>
                        <label for="modpass">Contraseña</label>
                        <input type="password" name="modpass"
                            placeholder="Escriba su contraseña"
                            value="<?php echo $array['password'] ?>">
                    </li>
                    <li>
                    <label for="modroles[]">Roles:</label>
                    <select name="modroles[]">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    </li>
                    <!--se guarda en un campo oculto el valor de la variable $idUser, para luego enviarlo al archivo modificarUsuarios.php al hacer clic en el botón "Modificar Usuario"-->
                    <input type="hidden" name="modidUser" value="<?php echo $idUser ?>">
                    <input type="hidden" name="modidLogin" value="<?php echo $array['idLogin'] ?>">

                    <li class="liButtons">
                        <button type="submit"> Modificar Usuario </button>
                    </li>
            </ul>
        </fieldset>
        </form>
    </div>

    <?php
    }
    $mysqli->close();
    ?>
    
<script 
    src="https://code.jquery.com/jquery-3.6.3.js" 
    integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" 
    crossorigin="anonymous">
</script>

<script src="../../script/trabajoFinalPhp.js"></script>

<?php include "../footer.php" ?>