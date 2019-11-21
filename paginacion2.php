<?php
   include 'conexion.php';
   include 'Zebra_Pagination.php';
   $query = "SELECT COUNT(*) FROM peliculas";
    $respuesta_ajax ='';
   if(isset($_POST['sql'])){
       echo 'entro a sql';
       $respuesta_ajax="";
        $sql= "SELECT * FROM peliculas WHERE nombre_pelicula LIKE '%".$_POST['sql']."%'";
        if($res=mysqli_query($conexion,$sql)){
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
    }else{
        //numero total de datos a mostrar por paginacion
        $resultados_por_pagina=2;
        $resultado=mysqli_query($conexion,$query);
        //obtener el total de registros devueltos de la consulta
        $total_registros=mysqli_fetch_array($resultado,MYSQLI_NUM)[0];

        $paginacion= new Zebra_Pagination();
        //colocar la cantidad todal de registros de la tabla en la base de datos
        $paginacion->records($total_registros);
        //cantidad total de resultados a mostrar en la tabla paginada
        //mostrar cuantos resultados queremos en cada pagina
        $paginacion->records_per_page($resultados_por_pagina);

        $query = "SELECT * FROM peliculas LIMIT ".(($paginacion->get_page()-1)*$resultados_por_pagina).",".$resultados_por_pagina;
        $resultado = mysqli_query($conexion,$query);

        while($row=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
            $respuesta_ajax.= "<tr><td><a href='".$row['url_pelicula']."'><img src='".$row['url_imagen']."' width='210' height='300'><a/></td></tr>";
        }
    }
    
    $paginacion->render();
?>