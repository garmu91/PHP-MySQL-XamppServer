<?php include("../conexionBBDD.php"); ?>

<table>
    <tr>
        <th>ID Usuario</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>ID Login</th>
        <th>Rol</th>
    </tr>
<?php

    $usuarios = $mysqli -> query("SELECT * FROM users_data JOIN users_login ON users_data.idUser = users_login.idUser
    ORDER BY idLogin DESC");

    if(!$usuarios -> num_rows) {
        echo "No hay registros";
    } else {
        //se guardan los datos dentro de un array
        while($busqueda = $usuarios -> fetch_array()){
    ?>
            <tr>
                <td><?php echo $busqueda['idUser'] ?></td>
                <td><?php echo $busqueda['nombre'] ?></td>
                <td><?php echo $busqueda['apellidos'] ?></td>
                <td><?php echo $busqueda['idLogin'] ?></td>
                <td><?php echo $busqueda['rol'] ?></td>
                <td>
                    <a href="./citaciones-administracion.php?idcrearCita=<?php echo $busqueda['idUser'] ?>">
                    Crear cita
                    </a>
                </td>
                <td>
                    <a href="./citaciones-administracion.php?idverCita=<?php echo $busqueda['idUser'] ?>">
                    Ver citas
                    </a>
                </td>
            </tr>
<?php
        }
    }
    $mysqli->close();
?>
</table>