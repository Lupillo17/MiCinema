<?php
    if(!empty($_POST)){
        session_start();
        if(isset($_SESSION['admin'])){
            if($_POST['txt_genero']=="accion"){
                $ruta_pelicula="Peliculas/Genero/accion/";
            }elseif($_POST['txt_genero']=="terror"){
                $ruta_pelicula="Peliculas/Genero/terror/";
            }elseif($_POST['txt_genero']=="comedia"){
                $ruta_pelicula="Peliculas/Genero/comedia/";
            }
            $ruta_imagen="Peliculas/img/";

            $nombre_pelicula=$_POST['txt_nombre'];
            $nombre_imagen=$_POST['txt_nombre'];

            $destiono_pelicula=$ruta_pelicula.$nombre_pelicula.".".end(explode(".",$_FILES['url_pelicula']['name']));
            $destiono_imagen=$ruta_imagen.$nombre_imagen.".".end(explode(".",$_FILES['url_imagen']['name']));
            
            //echo "#########".end(explode(".",$nombre))."##########";
            if(move_uploaded_file($_FILES['url_pelicula']['tmp_name'],$destiono_pelicula)){
                echo 'pelicula subido con extio';
                if(move_uploaded_file($_FILES['url_imagen']['tmp_name'],$destiono_imagen)){
                    echo "<center><h1>Subida con exito</h1></center>";
                    include 'conexion.php';
                    //si se quiere modificar la pelicula
                    if (isset($_POST['modificar'])) {
                        $descripcion=$_POST['txt_descripcion'];
                        $genero=$_POST['txt_genero'];
                        $antiguo=$_POST['key'];
                        $sql = "UPDATE peliculas SET
                                nombre_pelicula='$nombre_pelicula',
                                url_pelicula='$destiono_pelicula',
                                nombre_imagen='$nombre_imagen',
                                url_imagen='$destiono_imagen',
                                genero='$genero',
                                descripcion='$descripcion'
                            WHERE nombre_pelicula='$antiguo' LIMIT 1";
                        if($res=$conexion->query($sql)){
                            echo "<center><h1>MODIFICADO</h1></center>";
                            header("Refresh: 2; URL= indexAdmin.php");
                        }else {
                            echo "<center><h1>NO MODIFICADO</h1></center>";
                            echo $conexion->error;
                            echo "<center><a href='indexAdmin.php'>VOLVER</a></center>";
                        }
                    }else{
                        $sql = "INSERT INTO peliculas VALUES('".
                            $nombre_pelicula."','".
                            $destiono_pelicula."','".
                            $nombre_imagen."','".
                            $destiono_imagen."','".
                            $_POST['txt_genero']."','".
                            $_POST['txt_descripcion']."')";
                        if($res=$conexion->query($sql)){
                            echo "<center><h1>INSERTADO</h1></center>";
                            header("Refresh: 2; URL= indexAdmin.php");
                        }else {
                            echo "<center><h1>NO INSERTADO</h1></center>";
                            echo $conexion->error;
                            echo "<center><a href='guardar_peli.php'>VOLVER</a></center>";
                        }
                    }
                        

                    //header("Refresh: 3; url=guardar_peli.php");
                }else{
                    echo 'No se pudo subir la imagen';
                    echo $conexion->error;
                    echo "<center><a href='guardar_peli.php'>VOLVER</a></center>";
                }
            }else{
                echo 'No se pudo subir la pelicula';
                echo $conexion->error;
                echo "<center><a href='guardar_peli.php'>VOLVER</a></center>";
            }
        }else{
           header("Location: index.php");
        }
    }else{
        header("Location: index.php");
    }
?>