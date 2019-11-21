<?php 
	
	$usuario = "root";
	$contrasena = "root"; 
	$servidor = "localhost";
	$basededatos = "MiCinema";
	$conexion=new mysqli($servidor,$usuario,$contrasena,$basededatos);
	if($conexion->connect_error){
		die("Connection failed: " . $conexion->connect_error);
	}
	
	
?>
