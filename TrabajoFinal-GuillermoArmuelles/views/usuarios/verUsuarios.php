<div class="principal">
<?php
    //archivo para mostrar usuarios en la página del administrador

    //consulta para buscar los usuarios donde el "idUser" de la tabla "users_data" coincide con el "idUser" de la tabla "users_login"
    $result = $mysqli -> query("SELECT * FROM users_data JOIN users_login ON users_data.idUser = users_login.idUser
    ORDER BY idLogin DESC");

    if(!$result -> num_rows) {
        echo "No hay registros";
    } else {
        //se guardan los datos dentro de un array
        while($qry = $result -> fetch_array()){
?>
        <div class="smallest-card">
            <div class="little-title">
                <!--se muestran los resultados de acuerdo al valor del array-->
                <h4><?php echo $qry['idUser']?> - <?php echo $qry['usuario']?></h4>
            </div>        
            <div class="card-buttons">
                <a href="./usuarios-administracion.php?idUser=<?php echo ($qry['idUser']) ?>">
                    Modificar Usuario
                </a>
                <a href="./borrarUsuarios.php?idUser=<?php echo ($qry['idUser']) ?>">
                    Borrar Usuario
                </a>
            </div>
        </div>
<?php
        }
    }
    $mysqli->close();
?>
</div>