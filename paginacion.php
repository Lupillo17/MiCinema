<?php
    include_once 'conexion.php';
    include_once 'Zebra_Pagination.php';
    $query = "SELECT COUNT(*) FROM peliculas";
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
    $res = mysqli_query($conexion,$query);
    $count =0;
    $imprimir='';
    while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
        if($count==4){
            $imprimir.="</tr>";
            $count=0;
        }
        if($count==0){
            $imprimir.="<tr>";
        }
        $imprimir.=
            "<td><a href='".$row['url_pelicula']."'><img src='".$row['url_imagen']."' width='200' height='285'><a/></td>
            ";
        $count=$count+1;
        
    }
    $paginacion->css_classes(array(
        'list'      =>  'lista',
        'list_item' =>  'listItem',
        'anchor'    =>  'link',
    ));
    $paginacion->always_show_navigation(false);
    $paginacion->labels('Atras','Siguiente');
    $paginacion->selectable_pages(5);
    echo $imprimir;
    
?>
