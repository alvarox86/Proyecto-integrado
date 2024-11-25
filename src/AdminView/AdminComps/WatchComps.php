<!DOCTYPE html>
<html>
    <head>
        <title>Visualización de componentes</title>
        <meta charset="utf-8">
        <link rel="icon" href="../../img/logo.png">
		<link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
	<a href="AdminComps.php" align=center><h1>Volver atrás</h1></a>

        <?php
	$inc = include("../../assets/ConexDb/montatupc_con_db.php");
	if ($inc) {
		$consulta = "SELECT * FROM componentes";
		$resultado = mysqli_query($conex,$consulta);
	if ($resultado) {
		while ($row = $resultado->fetch_array()) {
	    $id_componente = $row['id_componente'];
	    $nom_componente = $row['nom_componente'];
		$stock = $row['stock'];
	    $descripcion = $row['descripcion'];
	    $fecha_reg = $row['fecha_agregado'];
		$precio = $row['precio'];
	    ?>
			<div class="containerWatch" align="center">
			<h2><?php echo $nom_componente; ?></h2>
					<p><b>ID: </b> <?php echo $id_componente; ?></p>
					<p><b>Cantidad en stock: </b> <?php echo $stock; ?></p>
					<p><b>Descripción: </b> <?php echo $descripcion; ?></p>
					<p><b>Fecha de agregado: </b> <?php echo $fecha_reg; ?></p>
					<p><b>Precio: </b> <?php  echo $precio ?></p>
			</div>
	    <?php
	    }
	}
}
?>
    </body>
</html>