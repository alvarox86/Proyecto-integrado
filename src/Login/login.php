<?php
    session_start(); //Iniciamos la sesión al principio de cada documento
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inicio de sesión</title>
        <link rel="icon" href="../assets/img/logo.png">
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>      
    <div>
        <h1 align="center" class="debes">Debes iniciar sesión para poder acceder a las demás páginas</h1>
        <form align="center" method="post" >
            <h1>Introduce tus datos para iniciar sesión</h1>
            <input type="email" name="correo" placeholder="Correo electrónico"><br><br>
            <input type="password" name="contrasena" placeholder="Contraseña"><br><br>
            <input type="submit" name="login"><br><br>
            <b><a href="../index.php">Volver al inicio</a></b><br><br>
            <b>¿No tienes cuenta? : <a href="register.php">Crear nueva cuenta</a></b>
        </form>
    </div>
    <?php
        if (isset($_POST['login'])) { //Comprueba que se ha pulsado el botón de login y esten completos los campos
            if (strlen($_POST['contrasena']) >= 1 && strlen($_POST['correo']) >= 1) {
                $correo = trim($_POST['correo']);
                $contrasena = trim($_POST['contrasena']);
                
                include("../assets/ConexDb/montatupc_con_db.php");
        
                // Consulta para obtener el usuario por correo
                $consulta = "SELECT * FROM usuarios WHERE correo = '$correo'";
                $resultado = mysqli_query($conex, $consulta);
        
                // Verificar si el usuario existe
                if (mysqli_num_rows($resultado) == 1) {
                    $row = mysqli_fetch_assoc($resultado);
        
                    // Verificar si la contraseña es correcta
                    if ($row['contrasena'] === $contrasena) {
                        // Guardar la información en la sesión
                        $_SESSION['correo'] = $correo;
                        $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
                        
                        // Comprabamos el tipo de usuario que es
                        if ($row['tipo_usuario'] === 'admin') {
                            header("Location: ../AdminView/admin.php"); // Redirige al modo administrador
                        } else {
                            header("Location: ../indexloged.php"); // Redirige al modo usuario 
                        }
                        exit();
                    } else {
                        echo "<h3>¡Contraseña incorrecta!</h3>";
                    }
                } else {
                    echo "<h3>Usuario no encontrado.</h3>";
                }
            } else {
                echo "<h3>¡Por favor complete los campos!</h3>";
            }
        }
        ?>
    </body>
</html>