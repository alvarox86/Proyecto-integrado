<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="../assets/img/logo.png">
</head>
<body>
    <h1>Bienvenido administrador </h1>
    <h2 class="correo"><?php echo $_SESSION['correo']; ?></h2>
    <h3>¿Qué deseas ver?</h3>

        <nav><br><br>
        <ul>
            <a href="AdminUser/AdminUser.php"><li>Usuarios</li></a>
            <a href="AdminOrders/AdminOrders.php"><li>Pedidos</li></a>
        </ul>
        </nav>

    <a href="../indexloged.php" class="vuelta"><h3>Volver a la página de inicio</h3></a>
</body>
</html>