<div class="navegacion">
	<ul class="menu">
		<li><a href="index.php">Inicio</a>
		<li><a>Categorias</a>
			<ul class="submenu">
				<li><a href="categorias.php?key=accion">Accion</a>
				<li><a href="categorias.php?key=comedia">Comedia</a>
				<li><a href="categorias.php?key=terror">Terror</a>
			</ul>
		
		<li><?php if(isset($_SESSION['nombre'])){?><a href="http://www.google.com"><?php echo $_SESSION['nombre'];?></a>
			<ul>
				<li><a>opcion</a>
				<li><a>opcion</a>
				<li><a>opcion</a>
				<li><a>opcion</a>
			</ul>
			<?php }else{?>
				<a href="login.html">iniciar sesion</a>
				<li><a href="registro.php">Registrarse</a>
			<?php }?>
	</ul>
</div>
