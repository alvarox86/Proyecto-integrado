<!DOCTYPE html>
<html>
    <head>
        <title>Visualización de pedidos</title>
        <meta charset="utf-8">
        <link rel="icon" href="../../img/logo.png">
		<link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
	<a href="AdminOrders.php" align=center><h1>Volver atrás</h1></a>

        <?php
	$inc = include("../../assets/ConexDb/montatupc_con_db.php");
	if ($inc) {
		$consulta = "SELECT * FROM pedidos_envios";
		$resultado = mysqli_query($conex,$consulta);
		if ($resultado) {
			while ($row = $resultado->fetch_array()) {
			$id_pedido = $row['id_pedido'];
			$id_usuario = $row['id_usuario'];
			$precio_total = $row['precio_total'];
			$estado = $row['estado'];
			$direccion = $row['direccion_envio'];
			$fecha_pedido = $row['fecha_pedido'];
			$descripcion = $row['descripcion_pedido'];
			?>
				<div class="containerWatch" align="center">
						<p><b>Identificador del pedido: </b> <?php echo $id_pedido; ?></p>
						<p><b>Identificador del usuario que ha realizado el pedido: </b> <?php echo $id_usuario; ?></p>
						<p><b>Precio total del pedido: </b> <?php  echo $precio_total ?>€</p>
						<p><b>Estado del pedido: </b> <?php echo $estado; ?></p>
						<p><b>Dirección envio:  </b> <?php echo $direccion; ?></p>
						<p><b>Fecha en la que se realizo el pedido:</b> <?php echo $fecha_pedido; ?></p>
						<p><b>Detalles del pedido: <br></b> <?php echo $descripcion?></p>
				</div>
			<?php
			}
		}
	}
?>
    </body>
</html>