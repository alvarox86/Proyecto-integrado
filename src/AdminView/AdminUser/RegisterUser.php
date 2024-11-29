<!DOCTYPE html>
<html>
    <head>
        <title>Registro de usuario</title>
        <link rel="icon" href="../../assets/img/logo.png">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <div>
    <form method="post" >
        <h2>Introduce los datos para registrar a un nuevo usuario</h2>
        <input type="text" name="nombre" placeholder="Nombre completo"><br><br>
        <input type="email" name="correo" placeholder="Correo electrónico"><br><br>
		<input type="text" name="direccion" placeholder="Dirección"><br><br>
		<input type="password" name="contrasena" placeholder="Contraseña"><br><br>
        <input type="submit" name="register"><br><br>
        <b><a href="adminUser.php">Volver atrás</a></b><br><br>
    </form>
</div>
<?php
if (isset($_POST['register'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['contrasena']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['direccion'])) {
	    $nombre = trim($_POST['nombre']);
		$correo = trim($_POST['correo']);
	    $contrasena = trim($_POST['contrasena']);
	    $fecha_reg = date("d/m/y");
		$direccion = trim($_POST['direccion']);
		include("../../assets/ConexDb/montatupc_con_db.php");
	    $consultaCorreo = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $resultadoCorreo = mysqli_query($conex, $consultaCorreo);
        
        if(mysqli_num_rows($resultadoCorreo) == 1){
            echo"<h3>¡El correo ya esta en uso!</h3>";
        } else
           if($nombre && $correo && $contrasena && $fecha_reg && $direccion ){
            $consulta = "INSERT INTO usuarios ( nombre, correo, contrasena, direccion, fecha_reg) VALUES ('$nombre','$correo','$contrasena','$direccion','$fecha_reg')";
            $resultado = mysqli_query($conex,$consulta);
        
            if($resultado) {
                echo "<h3>Usuario registrado correctamente!</h3>";
            } else {
                echo "<h3>¡Ups ha ocurrido un error!</h3>";
            }
           }
        }      
        else {
	    	echo "<h3>¡Por favor complete los campos!</h3>";
    }
}
?>
    </body>
</html>