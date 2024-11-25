<!DOCTYPE html>
<html>
    <head>
        <title>Registro de componentes </title>
        <link rel="icon" href="../../img/logo.png">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <div>
    <form method="post" >
        <h2>Introduce los datos del nuevo componente.</h2>
        <input type="text" name="nombre" placeholder="Nombre completo"><br><br>
        <input type="text" name="descripcion" placeholder="Descripción"><br><br>
		<input type="number" name="stock" placeholder="Stock del producto"><br><br>
		<input type="number" name="precio" placeholder="Precio"><br><br>
        <input type="submit" name="register"><br><br>
        <b><a href="AdminComps.php">Volver atrás</a></b><br><br>
    </form>
</div>
<?php
if (isset($_POST['register'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['stock']) >= 1 && strlen($_POST['precio']) >= 1 && strlen($_POST['descripcion'])) {
	    $nombre = trim($_POST['nombre']);
		$descripcion = trim($_POST['descripcion']);
	    $precio = trim($_POST['precio']);
	    $fecha_reg = date("d/m/y");
		$stock = trim($_POST['stock']);
		include("../../assets/ConexDb/montatupc_con_db.php");
	    $consultaNombre = "SELECT * FROM componentes WHERE nom_componente = '$nombre'";
        $resultadoComponente = mysqli_query($conex, $consultaNombre);
        
        if(mysqli_num_rows($resultadoComponente) === 1){
            ?>
                <h3>¡Este componente ya esta registrado!</h3>
            <?php
        } else
           if($nombre && $descripcion && $stock && $fecha_reg && $precio ){
            $consulta = "INSERT INTO componentes ( nom_componente, stock, precio, descripcion, fecha_agregado) VALUES ('$nombre','$stock','$precio','$descripcion','$fecha_reg')";
            $resultado = mysqli_query($conex,$consulta);
        
            if($resultado) {
                ?> 
                    <h3>Componente agregado correctamente!</h3>
               <?php
            } else {
                ?> 
                    <h3>¡Ups ha ocurrido un error!</h3>
               <?php
            }
           }
        }      
        else {
	    	?> 
	    	<h3>¡Por favor complete los campos!</h3>
           <?php
    }
}
?>
    </body>
</html>