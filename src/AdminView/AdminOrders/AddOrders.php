<!DOCTYPE html>
<html>
    <head>
        <title>Registro de pedido</title>
        <link rel="icon" href="../../img/logo.png">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <div>
    <form method="post" >
        <h2>Introduce los datos para registrar un nuevo pedido</h2>
        <input type="decimal" name="precio_total" placeholder="Precio del pedido"><br><br>
        <input type="text" name="estado_pedido" placeholder="Estado del pedido"><br><br>
        <input type="number" name="id_usuario" placeholder="Identificador de usuario"><br><br>
        <input type="submit" name="register"><br><br>
        <b><a href="adminOrders.php">Volver atrás</a></b><br><br>
    </form>
</div>
<?php
if (isset($_POST['register'])) {
    if (strlen($_POST['precio_total']) >= 1 && strlen($_POST['estado_pedido']) >= 1) {
		$precio_total = trim($_POST['precio_total']);
	    $estado_pedido = trim($_POST['estado_pedido']);
	    $fecha_reg = date("d/m/y");
        $id_usuario = trim($_POST['id_usuario']);
        include("../../assets/ConexDb/montatupc_con_db.php");

        $consulta_direccion_envio = "SELECT direccion FROM usuarios WHERE id_usuario = $id_usuario";
        $resultado_direccion_envio = mysqli_query($conex,$consulta_direccion_envio);
        $row = $resultado_direccion_envio->fetch_array();
        $direccion_envio = $row['direccion'];

        $consulta = "INSERT INTO pedidos_envios (precio_total, estado, fecha_pedido, id_usuario, direccion_envio) VALUES ('$precio_total', '$estado_pedido', '$fecha_reg', '$id_usuario', '$direccion_envio')";
        $resultado = mysqli_query($conex,$consulta);

           if($id_usuario && $estado_pedido  ){
                if($resultado) {
                    echo "<h3>¡Pedido registrado correctamente!</h3>";
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