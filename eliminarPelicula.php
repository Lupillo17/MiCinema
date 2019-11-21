<?php
include_once "conexion.php";
if(isset($_POST['eliminar'])){
    $sql ="DELETE FROM peliculas WHERE nombre_pelicula='".$_POST['key']."' LIMIT 1";
    if($res=$conexion->query($sql)){
        echo "<center><h1>ELIMINADO</h1></center>";
        header("Refresh: 2; URL= indexAdmin.php");
    }else {
        echo "<center><h1>NO ELIMINADO</h1></center>";
        echo $conexion->error;
        echo "<center><a href='indexAdmin.php'>VOLVER</a></center>";
    }
}
?>