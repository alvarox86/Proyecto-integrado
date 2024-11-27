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
        <input type="number" name="id_usuario" placeholder="Identificador de usuario"><br><br>
        <select name="estado">
            <option value="Pendiente">Pendiente</option>
            <option value="En preparacion">En preparación</option>
            <option value="Enviado">Enviado</option>
            <option value="Entregado">Entregado</option>
            <option value="Cancelado">Cancelado</option>
        </select><br><br>
        <textarea type="text+" name="descripcion" placeholder="Detalles del pedido" cols="50" rows="10"></textarea><br><br>
        <input type="submit" name="register" ><br><br>
        <b><a href="adminOrders.php">Volver atrás</a></b><br><br>
    </form>
</div>
<?php
if (isset($_POST['register'])) {
    if (strlen($_POST['precio_total']) >= 1 && strlen($_POST['estado_pedido']) >= 1) {
		$precio_total = trim($_POST['precio_total']);
	    $estado_pedido = trim($_POST['estado_pedido']);
        $descripcion = trim($_POST['descripcion']);
	    $fecha_reg = date("y/m/d");
        $id_usuario = trim($_POST['id_usuario']);
        include("../../assets/ConexDb/montatupc_con_db.php");

        $consulta_direccion_envio = "SELECT direccion FROM usuarios WHERE id_usuario = $id_usuario";
        $resultado_direccion_envio = mysqli_query($conex,$consulta_direccion_envio);
        $row = $resultado_direccion_envio->fetch_array();
        $direccion_envio = $row['direccion'];

        $consulta = "INSERT INTO pedidos_envios (precio_total, estado, fecha_pedido, id_usuario, direccion_envio, descripcion_pedido) VALUES ('$precio_total', '$estado_pedido', '$fecha_reg', '$id_usuario', '$direccion_envio', '$descripcion')";
        $resultado = mysqli_query($conex,$consulta);

           if($id_usuario && $estado_pedido && $descripcion && $precio_total){
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