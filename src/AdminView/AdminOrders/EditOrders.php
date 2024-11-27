<!DOCTYPE html>
<html>
    <head>
        <title>Editar pedidos</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" href="../../img/logo.png">
    </head>
<body>
<a href="AdminOrders.php" align=center><h1>Volver atrás</h1></a>

<div class="DivUserEdit"> 
    <form method="post" >
            <h2>Introduce los datos que desees editar en la base de datos</h2>
            <input type="number" min=1 name="id" placeholder="Identificador"><br><br>
            <select name="estado">
                <option value="Pendiente">Pendiente</option>
                <option value="En preparacion">En preparación</option>
                <option value="Enviado">Enviado</option>
                <option value="Entregado">Entregado</option>
                <option value="Cancelado">Cancelado</option>
            </select><br><br>
            <input type="submit" name="edit" value="Editar"><br><br>
            <p><b>Nota:</b></p>
            <p><b>Para editar el pedido, deberás indicar el identificador del pedido que quieras modificar </b></p>
            <p><b>Y a continuación tendrás que introducir los nuevos datos</b></p>
    </form>      
</div>

<?php
if (isset($_POST['edit'])) {
    if (strlen($_POST['estado']) >= 1 && strlen($_POST['id']) >= 1) {
	    $id = trim($_POST['id']);
        $estado = trim($_POST['estado']);
		include("../../assets/ConexDb/montatupc_con_db.php");
	    $consulta = "UPDATE pedidos_envios SET estado='$estado' WHERE id_pedido='$id'";
	    $resultado = mysqli_query($conex,$consulta);
            if ($resultado) {
                ?> 
                <h3>¡Editado corectamente!</h3>
               <?php
            } else {
                ?> 
                <h3>¡Ups ha ocurrido un error!</h3>
               <?php
            }
    } else{
        echo "<h3>¡Por favor complete los campos!</h3>";
    }  	
}
?>
</body>
</html>