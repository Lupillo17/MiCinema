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
        <title>Subir pelicula</title>
        <link rel="stylesheet" type="text/css" href="css/guardarPeli.css">
        <link rel="stylesheet" type="text/css" href="css/indexAdmin.css">
    </head>
    <body>
        <div id="contenidoBody">
            <?php include_once 'menuAdmin.php' ?>
            <form name="form" action="subir_peli.php" method="POST"  enctype="multipart/form-data">
            <b>Nombre pelicula: </b>
            <input type="text" name="txt_nombre" id="txt_nombre"><br>
            <b>Url pelicula: </b>
            <input type="file" name="url_pelicula" id="url_pelicula" accept="video/*"><br>
            <b>Url imagen: </b>
            <input type="file" name="url_imagen" id="url_imagen" accept='image/*'><br>
            <b>Genero: </b>
            <select name="txt_genero" id="txt_genero">
                <option>accion</option>
                <option>comedia</option>
                <option>terror</option>
            </select><br>
            <b>Descripcion: </b>
            <textarea  name="txt_descripcion" id="txt_descripcion">
            </textarea><br>
            <div id="btnGuardarCancelar">
                <input type="submit" value="Guardar"
                id="btnGuardar">
                <input type="button" value="Cancelar" id="btnCancelar">
            </div>
                
        </form>
        </div>
    </body>
    </html>
<?php }

?>