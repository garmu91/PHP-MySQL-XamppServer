<div class="principal">

<?php
    //archivo para mostrar las noticias en la página del administrador

    //consulta para buscar las noticias donde el "idUser" de la tabla "users_data" coincide con el "idUser" de la tabla "noticias", para así poder mostrar el nombre del usuario que la ha creado
    $result = $mysqli -> query("SELECT * FROM users_data JOIN noticias ON users_data.idUser = noticias.idUser
    ORDER BY idNoticia DESC");

    if(!$result -> num_rows){
        echo "No ha sido publicada ninguna noticia";
    } else {
        //se guardan los datos dentro de un array
        while($qry = $result -> fetch_array()){
?>
        <div class="small-card">
            <div class="card-title">
                <!--se muestran los resultados de acuerdo al valor del array-->
                <h4><?php echo $qry['titulo']?></h4>
            </div>
            <img class="card-img" src="../../asset/images/imagesNoticias/<?php echo $qry['imagen']?>" alt="Card image cap">
            <span>Publicado: <?php echo $qry['fecha']?></span>
            <span>Creador: <?php echo $qry['nombre']?></span>
            <p class="card-text"><?php echo $qry['texto']?></p>
            <div class="card-buttons">
                <!--al hacer clic en el enlace "Modificar noticia", se envía al URL el valor de "idNoticia", que luego se usa para rellenar el formulario de Modificar noticias en noticias-administracion.php-->
                <a href="./noticias-administracion.php?idNoticia=<?php echo ($qry['idNoticia'])?>">
                    Modificar Noticia
                </a>
                <!--al hacer clic en el enlace "Borrar noticia", se envía al archivo borrarNoticias.php el valor de "idNoticia" a través de la URL-->
                <a href="./borrarNoticias.php?idNoticia=<?php echo ($qry['idNoticia'])?>">Borrar Noticia</a>
            </div>
        </div>
<?php
        }
    }
    $mysqli->close();
?>

</div>