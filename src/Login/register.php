<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registro de usuario</title>
        <link rel="icon" href="../assets/img/logo.png">
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div>
<form method="post">
        <h1>Introduce tus datos para crear tu nueva cuenta</h1>
        <input type="text" name="nombre" placeholder="Nombre completo"><br><br>
        <input type="email" name="correo" placeholder="Correo electrónico"><br><br>
		<input type="text" name="direccion" placeholder="Dirección"><br><br>
		<input type="password" name="contrasena" placeholder="Contraseña"><br><br>
        <input type="submit" name="register"><br><br>
        <input type="submit" name="volver" value="Volver al inicio"><br><br>
        		<b><a href="../login/login.php">Volver a iniciar sesión</a></b>
    </form>
</div>
<?php
if(isset($_POST['volver'])){//Comprobamos si previamente se habia iniciado sesion ya que a la hora de volver al inicio volvias a index cuando ya habia iniciado sesión 
    if(!empty($_SESSION['correo'])){
        header("Location: ../indexloged.php");
    }else{
        header("Location: ../index.php");
    }
}
if (isset($_POST['register'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['contrasena']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['direccion'])) {
	    $nombre = trim($_POST['nombre']);
		$correo = trim($_POST['correo']);
	    $contrasena = trim($_POST['contrasena']);
	    $fecha_reg = date("d/m/y");
		$direccion = trim($_POST['direccion']);
		include("../assets/ConexDb/montatupc_con_db.php");
	    $consultaCorreo = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $resultadoCorreo = mysqli_query($conex, $consultaCorreo);
        
        if(mysqli_num_rows($resultadoCorreo) === 1){//Comprobacion de que el correo no se haya utilizado previamente para crear otro usuario
            echo "<h3>¡El correo ya esta en uso!</h3>";
        } else
           if($nombre && $correo && $contrasena && $fecha_reg && $direccion ){
            $consulta = "INSERT INTO usuarios ( nombre, correo, contrasena, direccion, fecha_reg) VALUES ('$nombre','$correo','$contrasena','$direccion','$fecha_reg')";
            $resultado = mysqli_query($conex,$consulta);
        
            if($resultado) {
                echo "<h3>¡Cuenta creada correctamente!</h3>";
            } else {
                echo "<h3>¡Ha ocurrido un error!</h3>";
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