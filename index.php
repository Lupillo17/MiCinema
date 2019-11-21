<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pagina principal</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="js/lib/TweenMax.min.js"></script>
    <script src="js/lib/Winwheel.min.js"></script>
    <script src="js/lib/jquery-3.4.1.min.js" type="text/javascript"></script>
    <!--<script src="js/busqueda.js"></script>-->
    <script src="js/busquedaConAjax.js"></script>

    
    
</head>

<body>
        
</body>
    <div id="contenidoBody">
        <!-- <input type="text" name="txt_buscar" id="txt_buscar"> -->
        <div id="contenido">
            <?php
            session_start();
            include 'menu.php';
            include 'carrusel.php';
            ?>
            <table>
                <tbody>
                    <div class='datos'></div>
                    <?php
                    include 'nuevaPaginacion.php';
                    paginar(6,1)
                    ?>
                </tbody>
            </table>
            <?php
                $paginacion->render();
            ?>
        </div>
        <canvas id="canvas" width="400px" height="400px"></canvas>
        <script src="js/ruleta.js"></script>
    </div>
</html>



<!--  
<html>
<video src="Peliculas\Marvel\antman.mp4" width="400px" heigh="400px" controls></video>
</html>
-->