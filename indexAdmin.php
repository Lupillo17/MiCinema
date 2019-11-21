<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <link rel="stylesheet" href="css/indexAdmin.css">
</head>
<body>
    <?php 
        session_start();
        if(isset($_SESSION['admin'])){?>
        <div id="contenidoBody">
        	<?php 
                include_once 'menuAdmin.php';
             ?>
            <div id="buscador">
                <input type="search" placeholder='Buscar pelicula' id="txtBuscador">
                <input type="button" value="Buscar" id="btnBuscar">
            </div>
            <div id="listaPeliculas">
            
                <?php
                    include_once 'nuevaPaginacion.php';
                    paginar(5,2);
                    $paginacion->render();
                ?>                
            </div>
        </div>
        <?php }else{
            header('Location: index.php');
        }
    ?>
</body>
</html>