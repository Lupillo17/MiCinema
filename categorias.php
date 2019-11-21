<!DOCTYPE html>
<html>
<head>
	<title>Categorias</title>
	<link rel="stylesheet" type="text/css" href="css/categorias.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<div id="contenidoBody">
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
                    paginar(6,3)
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
</body>
</html>