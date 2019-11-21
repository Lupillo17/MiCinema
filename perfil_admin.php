<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<link rel="stylesheet" type="text/css" href="css/indexAdmin.css">
</head>
<body>

<div id="contenidoBody">
	<?php
	session_start();
		//if(!empty($_POST)){
			if(isset($_SESSION['admin'])){
				include_once "conexion.php";
				include_once "menuAdmin.php";
				$sql= "SELECT * FROM admin WHERE usuario='".$_SESSION['admin']."'";
				if($res=$conexion->query($sql)){
		            $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
		        }else {
		        	echo "<center><h1>ERROR</h1></center>";
		            echo $conexion->error;
		            echo "<center><a href='indexAdmin.php'>VOLVER</a></center>";
		        }
			}else{
				//echo "<center><h1>No ah iniciado sesion</h1></center>";
				header("Location: index.php");
			}
		//}else{
		// 	echo "<center><h1>nada recibido</h1></center>";
		// 	//header("Refresh: 2; URL= indexAdmin.php");
		// }
	?>
	<div id="contenidoPerfil">
		<div id="izquierda">
			<img src="<?php echo $row['url_foto']; ?>">
		</div>
		<div id="derecha">
			<h1 id="nombre"><?php echo $row['nombre']?></h1>
			<h4>@<?php echo $row['usuario']; ?></h4>
			<h2>Informacion basica</h2>
			<h3>Nombre: <?php echo $row['nombre'];?></h3>
			<h3>Apellido paterno: <?php echo $row['apellido_pat'];?></h3>
			<h3>Apellido materno: <?php echo $row['apellido_mat'];?></h3>
			<h3>Edad: <?php echo $row['edad'];?></h3>
		</div>
	</div>
</div>
</body>
</html>