<?php
session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: index.php");
    }else{?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Modificar pelicula</title>
        <link rel="stylesheet" type="text/css" href="css/guardarPeli.css">
        <link rel="stylesheet" type="text/css" href="css/indexAdmin.css">
    </head>
    <body>
        <div id="contenidoBody">
            <?php include_once 'menuAdmin.php' ?>
            <form action="subir_peli.php" method="POST"  enctype="multipart/form-data">
                <?php 
                    include_once "conexion.php";
                    $res=$conexion->query("SELECT * FROM peliculas WHERE nombre_pelicula='".$_POST['key']."'");
                    $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
                ?>
                <b>Nombre pelicula: </b>
                <input type="text" name="txt_nombre" id="txt_nombre" value="<?php echo $row['nombre_pelicula'] ?>"><br>
                <b>Url pelicula: </b>
                <input type="file" name="url_pelicula" id="url_pelicula" accept="video/*"><br>
                <b>Url imagen: </b>
                <input type="file" name="url_imagen" id="url_imagen" accept='image/*'><br>
                <b>Genero: </b>
                <select name="txt_genero" id="txt_genero">
                    <?php if($row['genero']=='accion'){?>
                        <option selected>accion</option>
                        <option>comedia</option>
                        <option>terror</option>
                    <?php }else if($row['genero']=='comedia'){?>
                        <option selected>comedia</option>
                        <option>accion</option>
                        <option>terror</option>
                    <?php }else if($row['genero']=='terror'){?>
                        <option selected>terror</option>
                        <option>accion</option>
                        <option>comedia</option>
                    <?php }?>

                </select><br>
                <b>Descripcion: </b>
                <textarea  name="txt_descripcion" id="txt_descripcion"><?php echo $row['descripcion'] ?></textarea><br>
                <div id="btnGuardarCancelar">
                    <input type="submit" value="Guardar"
                    id="btnGuardar" name="modificar">
                    <input type="button" value="Cancelar" id="btnCancelar" onclick="location.href='indexAdmin.php'">
                </div>
                <input type="hidden" name="key" value="<?php echo $_POST['key']?>">
        </form>
        </div>
        
    </body>
    </html>
<?php }

?>