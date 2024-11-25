<!DOCTYPE html>
<html>
    <head>
        <title>Editar componentes</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" href="../../img/logo.png">
    </head>
<body>
<a href="AdminComps.php" align=center><h1>Volver atrás</h1></a>
<div class="DivUserEdit"> 
    <form method="post" >
            <h2>Introduce los datos que desees editar en la base de datos</h2>
            <input type="number" min=1 name="id" placeholder="Identificador"><br><br>
            <input type="text" name="nombre" placeholder="Nombre del producto"><br><br>
            <input type="text" name="descripcion" placeholder="Descripción del producto"><br><br>
            <input type="number" name="precio" placeholder="Precio"><br><br>
            <input type="number" name="stock" placeholder="Stock del producto"><br><br>
            <input type="submit" name="edit" value="Editar"><br><br>
            <p><b>Nota:</b></p>
            <p><b>Para editar el componente deberás indicar su identificador </b></p>
            <p><b>Para ello, deberás <a href="WatchComps.php">visualizar</a> la base de datos y buscar el identificador del componente a editar </b></p>
            <p><b></b></p>
    </form>      
</div>

<?php

if (isset($_POST['edit'])) {
    if (strlen($_POST['id']) >= 1 && strlen($_POST['nombre'])  && strlen($_POST['descripcion'])  && strlen($_POST['precio'])  && strlen($_POST['stock'])) {
	    $id = trim($_POST['id']);
        $nombre = trim($_POST['nombre']);
        $descripcion = trim($_POST['descripcion']);
        $stock = trim($_POST['stock']);
		$precio = trim($_POST['precio']);
		include("../../assets/ConexDb/montatupc_con_db.php");
	    $consulta = "UPDATE componentes SET nom_componente='$nombre', descripcion='$descripcion', stock='$stock', precio='$precio' WHERE id_componente='$id'";
	    $resultado = mysqli_query($conex,$consulta);
        $usuariopermitido = ['admin', 'user'];
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
        ?>
        <h3>¡Por favor complete los campos!</h3>
        <?php
    }  	
}
?>
</body>
</html>