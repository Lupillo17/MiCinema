<?php 
	if(!empty($_POST)){
        include 'conexion.php';
        $sentencia=mysqli_prepare($conexion,"SELECT correo, contrasena FROM usuarios where correo=? AND contrasena=?");
        mysqli_stmt_bind_param($sentencia,'ss',$c,$p);
        $c=$_POST['txt_usuario'];
        $p=hash('sha512',$_POST['txt_password']);
        mysqli_stmt_execute($sentencia);
        if(mysqli_stmt_bind_result($sentencia,$res1,$res2)){
            $arg=array();
            while(mysqli_stmt_fetch($sentencia)){
                array_push($arg,$res1,$res2);
            }
            
            if(count($arg)>0){
            	session_start();
            	echo $c;
            	$sentencia="SELECT nombre,apellido_pat,apellido_mat,nombre_usuario,correo FROM usuarios WHERE correo='$c'";
            	if($res=mysqli_query($conexion,$sentencia)){
            	    $row= mysqli_fetch_array($res,MYSQLI_ASSOC);
            	    $_SESSION['nombre']=$row['nombre'];
            	    $_SESSION['apellido_pat']=$row['apellido_pat'];
            	    $_SESSION['apellido_mat']=$row['apellido_mat'];
            	    $_SESSION['nombre_usuario']=$row['nombre_usuario'];
            	    $_SESSION['correo']=$row['correo'];
            	    header('Location:index.php');
            	}else{
            	    echo mysqli_error($conexion);
            	}
            	
               // header("Refresh: 30; URL='pagina.php'");
           		// mysqli_stmt_close($sentencia);
            }else {?>
            	<form action="login.html">
	                <h3>Usuario o password incorrectos</h3>
                	<input type="submit" value="volver" id="btn_volver">
                </form>
            <?php }
            
        }
        
    }
?>
