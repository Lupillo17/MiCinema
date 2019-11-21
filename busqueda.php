<?php
    include_once 'conexion.php';
    $respuesta_ajax="";
    $query= "SELECT * FROM peliculas";

    if(isset($_POST['sql'])){
        $query= "SELECT * FROM peliculas WHERE nombre_pelicula LIKE '%".$_POST['sql']."%'";
    }

    

    if($res=mysqli_query($conexion,$query)){
        $count=0;
        while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
            if($count==4){
                $respuesta_ajax.="</tr>";
                $count=0;
            }
            if($count==0){
                $respuesta_ajax.="<tr>";
            }
            $respuesta_ajax.=
                "<td><a href='".$row['url_pelicula']."'><img src='".$row['url_imagen']."' width='210' height='300'><a/></td>
                ";
            $count=$count+1;
            
        }
    }else{
        $respuesta_ajax.='no hay datos<br>'.$conexion->error;
    }
    $conexion->close();
    echo $respuesta_ajax;
?>