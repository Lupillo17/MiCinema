<?php
if(!empty($_POST)){
    include 'conexion.php';
    $sentencia="SELECT * FROM admin 
    WHERE usuario='".$_POST['txt_usuario']."' 
    AND password='".hash('sha512',$_POST['txt_password'])."'";
    
    if($res = mysqli_query($conexion,$sentencia)){
        $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
        session_start();
        $_SESSION['admin']=$row['usuario'];
        header("Location: indexAdmin.php");
    }else{
        header("Location:loginAdmin.html");
    }
}
?>