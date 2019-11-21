<?php 
	if (!empty($_POST)) {
		if ($_POST['txt_nombre']!=""or $_POST['txt_nombre']!=null) {
			if ($_POST['txt_app']!=""or $_POST['txt_app']!=null) {
				if ($_POST['txt_apm']!=""or $_POST['txt_apm']!=null) {
				    if ($_POST['txt_usuario']!=""or $_POST['txt_usuario']!=null) {
				        if ($_POST['txt_correo']!=""or $_POST['txt_correo']!=null) {
				            if ($_POST['txt_password']!=""or $_POST['txt_password']!=null) {
                                include 'conexion.php';
                                $sentencia = $conexion->prepare(
                                    "INSERT INTO usuarios (nombre,apellido_pat,apellido_mat,nombre_usuario,correo,contrasena)
                                    VALUES (?,?,?,?,?,?)");
                                $sentencia->bind_param("ssssss",$n,$app,$apm,$nu,$c,$p);
                                $n=$_POST['txt_nombre'];
                                $app=$_POST['txt_app'];
                                $apm=$_POST['txt_apm'];
                                $nu=$_POST['txt_usuario'];
                                $c=$_POST['txt_correo'];
                                $p=hash('sha512',$_POST['txt_password']);
                                
                                if($sentencia->execute()){
                                    echo 'se agrego';
                                    $sentencia->close();
                                    $conexion->close();
                                }else{
                                    echo 'Error:', $sentencia->error;
                                }
                                
                            }else{
                                
                            }
                        }else{

                        }
                    }else{

                    }
                }else{

                }
			}else{
				
			}
		}else{
				
		}
	}else{

	}
?>
