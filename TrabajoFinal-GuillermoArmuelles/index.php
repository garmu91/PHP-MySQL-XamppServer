<?php
    //se reanuda la sesión actual
    session_start();
    
    //si la sesión "valida" no está definida o es null, incluye el archivo header para visitantes 
    if (!isset($_SESSION["valida"])) {
        include("./views/headerIndex/headerIndex.php");
        //si la sesión "valida" está definida y la sesión "rol" es igual a "admin", incluye el archivo header para administradores 
    } elseif ($_SESSION["rol"]=="admin"){
        include("./views/headerIndex/headerIndexAdmin.php");
        //si la sesión "valida" está definida y la sesión "rol" es igual a "user", incluye el archivo header para usuarios
    } elseif($_SESSION["rol"]=="user"){
        include("./views/headerIndex/headerIndexUser.php");   
    }
?>

<?php
    //si se declara la variable "accion"
    if(isset($_GET["accion"])){
        //se liberan todas las variables de sesión
        session_unset();
        //se destruye toda la información registrada en la sesión
        session_destroy();
        header('Refresh: 0; URL=./index.php');
    }
?>
    
    <main>
        <div class="div1">
            <h1>Servicios de Programación Web</h1>
                <section>
                    <h2> > Maquetación Web - Programación Web - Manejo de Bases de Datos - Backend y Frontend - Mantenimiento </h2>
                    <p> > HTML5 - CSS3 - JavaScript - SQL - PHP</p>
                </section>
        </div>
        
        <div class="bisel-abajo"></div>
        
        <div id="slider">
            <h2>Portafolio de Proyectos</h2>
            <div>
                <img class="flechas" src="./asset/images/flechaIzq.png" alt="Flecha izquierda" width="241" height="241" onclick="moverizq();">

                <img class="fotos ocultas" id="img" src="./asset/images/captura.png" alt="Captura de pantalla de un sitio web">
                <img class="fotos ocultas" id="img1" src="./asset/images/captura1.png" alt="Captura de pantalla de un sitio web">
                <img class="fotos op80" id="img2" src="./asset/images/captura2.png" alt="Captura de pantalla de un sitio web">
                <img class="fotos" id="img3" src="./asset/images/captura3.png" alt="Captura de pantalla de un sitio web">
                <img class="fotos op80" id="img4" src="./asset/images/captura4.png" alt="Captura de pantalla de un sitio web">
                <img class="fotos ocultas" id="img5" src="./asset/images/captura5.png" alt="Captura de pantalla de base de datos">
                <img class="fotos ocultas" id="img6" src="./asset/images/captura6.png" alt="Captura de pantalla de base de datos">

                <img class="flechas" src="./asset/images/flechaDer.png" alt="Flecha derecha" width="241" height="241" onclick="moverder();">
            </div>
        </div>
        
        <div class="bisel-arriba"></div>
        
        <section class="div3">
            <h2>Nuestros Valores</h2>
            <div class="img_section1">
                <figure>
                    <img src="./asset/images/imagen1.png" alt="Imagen de listón azul" width="640" height="640">
                    <figcaption>
                        <h3>Calidad Garantizada</h3>
                    </figcaption>
                </figure>

                <figure>
                    <img src="./asset/images/imagen2.png" alt="Imagen de reloj" width="640" height="640">
                    <figcaption>
                        <h3>Plazos Asegurados</h3>
                    </figcaption>
                </figure>

                <figure>
                    <img src="./asset/images/imagen3.png" alt="Dibujo de dos hombres dándose la mano" width="640" height="640">
                    <figcaption>
                        <h3>Atención Personalizada</h3>
                    </figcaption>
                </figure>
            </div>
        </section>

    </main>

    <footer>
            <h3>Síguenos en:</h3>
            <a href="#"><img src="./asset/images/github.webp" alt="Logo de Github" width="256" height="256" class="logo_redes">|</a>
            <a href="#"><img src="./asset/images/instagram.png" alt="Logo de Instagram" width="256" height="256" class="logo_redes">|</a>
            <a href="#"><img src="./asset/images/youtube.webp" alt="Logo de Youtube" width="256" height="256" class="logo_redes">|</a>
            <a href="#">Aviso Legal</a>
    </footer>

    <script 
    src="https://code.jquery.com/jquery-3.6.3.js" 
    integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" 
    crossorigin="anonymous">
    </script>

    <script src="./script/trabajoFinalPhp.js"></script>

</body>

</html>