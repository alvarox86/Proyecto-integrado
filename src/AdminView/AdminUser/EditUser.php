<!DOCTYPE html>
<html>
    <head>
        <title>Editar usuarios</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" href="../../assets/img/logo.png">
    </head>
<body>
<a href="AdminUser.php" align=center><h1>Volver atrás</h1></a>

<div class="DivUserEdit"> 
    <form method="post" >
            <h2>Introduce los datos que desees borrar de la base de datos</h2>
            <input type="text" name="nombre" placeholder="Nombre completo"><br><br>
            <input type="email" name="correo" placeholder="Correo electrónico"><br><br>
            <input type="text" name="direccion" placeholder="Dirección"><br><br>
            <input type="password" name="contrasena" placeholder="Contraseña"><br><br>
            <input type="submit" name="borrar" value="Borrar"><br><br>
            <p><b>Nota:</b></p>
            <p><b>Para borrar un usuario deberás indicar los datos del usuario de manera exacta para poder borrarlos</b></p>
    </form>
    <form method="post" >
            <h2>Introduce los datos que desees editar en la base de datos</h2>
            <input type="number" min=1 name="id" placeholder="Identificador"><br><br>
            <input type="text" name="nombre" placeholder="Nombre completo"><br><br>
            <input type="email" name="correo" placeholder="Correo electrónico"><br><br>
            <input type="text" name="direccion" placeholder="Dirección"><br><br>
            <input type="password" name="contrasena" placeholder="Contraseña"><br><br>
            <select name="tipousuario">
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select><br><br>
            <input type="submit" name="edit" value="Editar"><br><br>
            <p><b>Nota:</b></p>
            <p><b>Para editar el usuario deberás indicar el identificador del usuario </b></p>
            <p><b></b></p>
    </form>      
</div>

<?php
if (isset($_POST['borrar'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['contrasena']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['direccion'])) {
	    $nombre = trim($_POST['nombre']);
	    $contrasena = trim($_POST['contrasena']);
        $correo = trim($_POST['correo']);
        $direccion = trim($_POST['direccion']);

		include("../../assets/ConexDb/montatupc_con_db.php");
	    $consulta = "DELETE FROM usuarios WHERE nombre ='$nombre' AND contrasena = '$contrasena'";
	    $resultado = mysqli_query($conex,$consulta);
	    if ($resultado) {
            echo "<h3>¡Borrado corectamente!</h3>";
	    } else {
	    	echo "<h3>¡Ups ha ocurrido un error!</h3>";
	    }
    } else{
        echo "<h3>¡Por favor complete los campos!</h3>";
    }  	
} 

if (isset($_POST['edit'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['contrasena']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['direccion']) && strlen($_POST['id']) >= 1) {
	    $id = trim($_POST['id']);
        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['correo']);
		$direccion = trim($_POST['direccion']);
	    $contrasena = trim($_POST['contrasena']);
        $tipousuario = trim($_POST['tipousuario']);
		include("../../assets/ConexDb/montatupc_con_db.php");
	    $consultaEdit = "UPDATE usuarios SET nombre='$nombre', correo='$correo', direccion='$direccion', contrasena='$contrasena', tipo_usuario='$tipousuario' WHERE id_usuario='$id'";
	    $resultadoEdit = mysqli_query($conex,$consultaEdit);
        if ($tipousuario) {
            if ($resultadoEdit) {
                echo "<h3>¡Editado corectamente!</h3>";
            } 
            else {
                echo "<h3>¡Ups ha ocurrido un error!</h3>";
            }      
        }
    } else{
        echo "<h3>¡Por favor complete los campos!</h3>";
    }  	
}
?>
</body>
</html>