<!DOCTYPE html>
<html>
    <head>
        <title>Visualización de usuarios</title>
        <meta charset="utf-8">
        <link rel="icon" href="../../img/logo.png">
		<link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
	<a href="AdminUser.php" align=center><h1>Volver atrás</h1></a>

        <?php
	$inc = include("../../assets/ConexDb/montatupc_con_db.php");
	if ($inc) {
		$consulta = "SELECT * FROM usuarios";
		$resultado = mysqli_query($conex,$consulta);
	if ($resultado) {
		while ($row = $resultado->fetch_array()) {
	    $id_usuario = $row['id_usuario'];
	    $nombre = $row['nombre'];
		$correo = $row['correo'];
	    $contrasena = $row['contrasena'];
	    $fecha_reg = $row['fecha_reg'];
		$direccion = $row['direccion'];
	    ?>
			<div class="containerWatch" align="center">
			<h2><?php echo $nombre; ?></h2>
					<p><b>ID: </b> <?php echo $id_usuario; ?></p>
					<p><b>Correo: </b> <?php echo $correo; ?></p>
					<p><b>Contraseña: </b> <?php echo $contrasena; ?></p>
					<p><b>Fecha Registro: </b> <?php echo $fecha_reg; ?></p>
					<p><b>Dirección: </b> <?php  echo $direccion ?></p>
			</div>
	    <?php
	    }
	}
}
?>
    </body>
</html>