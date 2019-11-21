<?php
    include_once 'conexion.php';
    include_once 'Zebra_Pagination.php';
    $total_registros;
    //numero total de datos a mostrar por paginacion
    
    //obtener el total de registros devueltos de la consulta
    $query = "SELECT COUNT(*) FROM peliculas";
    $resultado=mysqli_query($conexion,$query);
    $total_registros=mysqli_fetch_array($resultado,MYSQLI_NUM)[0];

    $paginacion= new Zebra_Pagination();
    function paginar($resultados_por_pagina, $tipo){
        global $paginacion, $total_registros, $conexion;
        //colocar la cantidad todal de registros de la tabla en la base de datos
        $paginacion->records($total_registros);
        //cantidad total de resultados a mostrar en la tabla paginada
        //mostrar cuantos resultados queremos en cada pagina
        $paginacion->records_per_page($resultados_por_pagina);

        $query = "SELECT * FROM peliculas LIMIT ".(($paginacion->get_page()-1)*$resultados_por_pagina).",".$resultados_por_pagina;
        $res = mysqli_query($conexion,$query);
        
        if($tipo==1){
            tipo1($res,$resultados_por_pagina);
        }elseif($tipo==2){
            tipo2($res);
        }else if($tipo==3){
            $genero=$_GET['key'];
            $query = "SELECT * FROM peliculas WHERE genero='$genero' LIMIT ".(($paginacion->get_page()-1)*$resultados_por_pagina).",".$resultados_por_pagina;
            $res = mysqli_query($conexion,$query);
            tipo1($res,$resultados_por_pagina);
        }
    }
    
    //tipo1 muestra la paginacion para los usuarios
    //en caso de que en el tipo se haya mandado 3 se reutiliza el codigo para mostrar 
    //solo los tipos de categorias en categorias.php
    function tipo1($res,$resultados_por_pagina){
        global $paginacion;
        $count =0;
        $imprimir='';
        while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
            if($count==$resultados_por_pagina){
                $imprimir.="</tr>";
                $count=0;
            }
            if($count==0){
                $imprimir.="<tr>";
            }
            $imprimir.=
                "<td><a href='".$row['url_pelicula']."'><img src='".$row['url_imagen']."' width='180' height='230px'><a/></td>
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
    }
    
//function 2 muestra listado de las peliculas para el administrador en indexAdmin.php
    function tipo2($res){
        global $paginacion;
        while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){?>
            <div class="itemPeliculas">
                <img src="<?php echo $row['url_imagen']; ?>" alt="image" class="img" width="180px" height="230px">
                <div class="infoItemPelicula">
                    <p><?php echo $row['nombre_pelicula'] ?></p>
                    <p>Fecha: 2019</p>
                    <p><?php echo $row['genero'] ?></p>
                </div>
                <form style="display: inline-block; width: 30%;" action="modificar_pelicula.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="key" value="<?php echo $row['nombre_pelicula']; ?>">
                    <input type="submit" class="btn" id="btnModificar" value="Modificar">
                    <input type="submit" class="btn" id="btnEliminar" name="eliminar" value="Eliminar" formaction="eliminarPelicula.php" formmethod="POST">
                    
                </form>
                    
            </div>
            <hr size='2' color='gray'>
        <?php }
        $paginacion->css_classes(array(
            'list'      =>  'lista',
            'list_item' =>  'listItem',
            'anchor'    =>  'link',
        ));
        $paginacion->always_show_navigation(false);
        $paginacion->labels('Atras','Siguiente');
        $paginacion->selectable_pages(5);        
    }

    
        
    
?>
