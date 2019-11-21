<link rel="stylesheet" href="css/carrusel.css">
<div class="carrusel">
    <div class="contenido-carrusel">
        <?php 
            include_once 'conexion.php';
            $sql = 'SELECT url_pelicula, url_imagen FROM peliculas';
            if($res=$conexion->query($sql)){
                while($row=$res->fetch_array(MYSQLI_NUM)){?>
                    <figure><a href="<?php echo $row[0]?>"><img src="<?php echo $row[1]; ?>"></a></figure>
        <?php   }
            }
        ?>
    </div>
</div>