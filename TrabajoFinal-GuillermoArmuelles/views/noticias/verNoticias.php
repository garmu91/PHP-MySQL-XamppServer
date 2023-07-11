<div class="principal">

<?php
    //archivo para mostrar las noticias sin los botones de Borrar o Modificar

    $result = $mysqli -> query("SELECT * FROM users_data JOIN noticias ON users_data.idUser = noticias.idUser
    ORDER BY idNoticia DESC");

    if(!$result -> num_rows){
        echo "No ha sido publicada ninguna noticia";
    } else {
        while($qry = $result -> fetch_array()){
?>
        <div class="small-card">
            <div class="card-title">
                <h4><?php echo $qry['titulo']?></h4>
            </div>
            <img class="card-img" src="../../asset/images/imagesNoticias/<?php echo $qry['imagen']?>" alt="Card image cap">
            <span>Publicado: <?php echo $qry['fecha']?></span>
            <span>Creador: <?php echo $qry['nombre']?></span>
            <p class="card-text"><?php echo $qry['texto']?></p>
        </div>
<?php
        }
    }
    $mysqli->close();
?>

</div>