<?php include("../denegaciones/denegacionUser.php"); ?>

<?php include("../validarSesion.php"); ?>

    <?php include "./variablesGet.php" ?>

    <?php include "./msjError.php" ?>

    <div class="container">
        <form action="./crearNoticias.php" method="post">
        <fieldset>
            <legend>Crear noticias</legend>
                <ul class="flex-outer">
                    <li>
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" 
                            placeholder="Escribe un título"
                            value="<?php echo($titulo==1)?"":$titulo ?>">
                    </li>
                    <span><?php echo ($titulo==1)?$err1:"" ?></span>
                    <li>
                        <label for="fechaPubli">Fecha de publicación</label>
                        <input type="date" name="fechaPubli"
                        value="<?php echo($fechaPubli==1)?"":$fechaPubli ?>">
                    </li>
                    <span><?php echo ($fechaPubli==1)?$err2:"" ?></span>
                    <li>
                        <label for="texto">Texto de la noticia</label>
                        <textarea name="texto" rows="15"><?php echo($texto==1)?"":$texto ?></textarea>
                    </li>
                    <span><?php echo ($texto==1)?$err3:"" ?></span>
                    <li>
                        <!--se escribe el nombre del archivo y su extensión para no guardar el archivo entero en la BBDD-->
                        <label for="foto">Foto de la noticia</label>
                        <input type="text" name="foto" 
                            placeholder="Escribe el nombre del archivo y su extensión"
                            value="<?php echo($foto==1)?"":$foto ?>">
                    </li>
                    <span><?php echo ($foto==1)?$err4:"" ?></span>
                    <li>
                        <!--recupera el valor de la variable $_SESSION["usuario"]-->
                        <label for="nombre">Nombre de usuario</label>
                        <input type="text" name="nombre" 
                            placeholder="Usuario que crea la noticia"
                            value="<?php echo ($_SESSION["usuario"]) ?>">
                    </li>
                    <span><?php echo ($nombre==1)?$err5:"" ?></span>
                    <li class="liButtons">
                        <button type="reset">Borrar</button>
                        <button type="submit"> Crear Noticia </button>
                    </li>
                </ul>
        </fieldset>
        </form>
    </div>

    <?php include("../conexionBBDD.php"); ?>

    <?php include("./verNoticiasAdmin.php"); ?>

    <?php include("../conexionBBDD.php"); ?>

    <?php
    //se recoge el valor de "idNoticia" de la URL, enviado al hacer clic en el botón "Modificar noticia"
    $idNoticia = filter_input(INPUT_GET, 'idNoticia', FILTER_SANITIZE_NUMBER_INT);
        
    if (!empty($idNoticia)) {
        
        $query = "SELECT * FROM `noticias` WHERE 1";
        $query.= " AND `idNoticia` = '".$idNoticia."'";

        //se guarda el resultado de la consulta en un array
        if ($resulta = $mysqli->query($query)) {
            if($resulta -> num_rows > 0) {
                $array = $resulta -> fetch_array();
            }
        } else {
            echo "La noticia no existe";
        }
        
    ?>
    <div class="container">
        <form action="./modificarNoticias.php" method="post">
        <fieldset>
            <legend>Modificar noticias</legend>
                <ul class="flex-outer">
                    <li>
                        <!--se muestran los valores correspondientes del array-->
                        <label for="modtitulo">Título</label>
                        <input type="text" name="modtitulo" 
                            placeholder="Escribe un título"
                            value="<?php echo $array['titulo']?>" autofocus>
                    </li>
                    <li>
                        <label for="modfecha">Fecha de publicación</label>
                        <input type="date" name="modfecha" 
                        value="<?php echo $array['fecha']?>">
                    </li>
                    <li>
                        <label for="modtexto">Texto de la noticia</label>
                        <textarea name="modtexto" rows="15"><?php echo $array['texto']?></textarea>
                    </li>
                    <li>
                        <label for="modfoto">Foto de la noticia</label>
                        <input type="text" name="modfoto" 
                            placeholder="Escribe el nombre del archivo y su extensión" 
                            value="<?php echo $array['imagen']?>">
                    </li>
                    <li>
                        <label for="modnombre">Nombre de usuario</label>
                        <input type="text" name="modnombre" 
                            placeholder="Usuario que crea la noticia"
                            value="<?php echo ($_SESSION["usuario"]) ?>">
                    </li>
                    <!--se guarda en un campo oculto el valor de la variable $idNoticia, para luego enviarlo al archivo modificarNoticias.php al hacer clic en el botón "Modificar Noticia"-->
                    <input type="hidden" name="modidNoticia" value="<?php echo $idNoticia ?>">

                    <li class="liButtons">
                        <button type="submit"> Modificar Noticia </button>
                    </li>
                </ul>
        </fieldset>
        </form>
    </div>

    <?php
    }
    $mysqli->close();
    ?>

<?php include "../footer.php" ?>