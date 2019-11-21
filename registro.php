<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrarse</title>

    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">

    
</head>

<body>
<div id="contenidoBody">
    <div id="container">
        <?php include "menu.php";?>
        <form action="registrando.php" method="POST" id="cuerpo">

            <h3>Nombre</h3>
            <input type="text" name="txt_nombre" id="txt_nombre">
            <h3>Apellido paterno</h3>
            <input type="text" name="txt_app" id="txt_app">
            <h3>Apellido materno</h3>
            <input type="text" name="txt_apm" id="txt_apm">
            <h3>Nombre de usuario</h3>
            <input type="text" name="txt_usuario" id="txt_usuario">
            <h3>Correo electronico</h3>
            <input type="text" name="txt_correo" id="txt_correo">
            <h3>Contraseña</h3>
            <input type="password" name="txt_password" id="txt_password">
            <input type="submit" value="Registrarse" id="btb_registrarse">  
        </form>
    </div>
</div>
    
</body>

</html>
