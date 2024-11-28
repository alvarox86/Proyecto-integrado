<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MontaTuPC</title>
        <link rel="stylesheet" href="main.css">
        <link rel="icon" href="img/logo.png">
    </head>
    <body>
        <script src="main.js"  type="module"></script>
        <header>
                <a href="index.php" class="logo"><img src="img/logo.png" alt="logotipo"></a>
                <a href="login/login.php" class="productos">Productos</a>
                <a href="login/login.php" class="montaPc">Monta tu PC</a>
                <a href="login/login.php" class="carrito"><img src="img/carrito.png" alt="carrito"></a>
                <a href="login/login.php" class="loginButton"><img src="img/login.png" alt="login">
                    <?php //Comprobamos a la hora de salir de la pagina de login para que en el caso de que no se haya iniciado sesion y se quiera salir no de error a la hora de mostrar el email
                        if (isset($_SESSION['correo']) && !empty($_SESSION['correo'])) {
                            echo $_SESSION['correo'];
                        } else {
                            echo 'Mi cuenta';
                        }
                    ?>
                </a>                    
        </header>

        <main class="mainContent">
            <h2>Nuestros productos</h2>
                <div class="carrusel">
                    <div class="imagenes" id="imagenes"></div>
                    <button id="anterior"><</button>
                    <button id="siguiente">></button>
                </div><br><br><br><br><br><br>

            <script src="main.js"></script>
            
            <h2>Marcas colaboradoras</h2>

            <div id="data-grid" class="data-grid"></div>

            <div id="data" class="data"></div>
        </main>

        <footer class="footer">
            <div class="footerContent">
                <div class="footerSection links">
                    <h4>Enlaces rápidos</h4>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Catálogo de Componentes</a></li>
                        <li><a href="#">Configura tu PC</a></li>
                    </ul>
                </div>
                <div class="footerSection contact">
                    <h4>Contacto</h4>
                    <p>¿Tienes alguna pregunta? ¡Contáctanos!</p>
                    <p> +34 600 123 456</p>
                    <p> soporte@montatupc.com</p>
                </div>
                <div class="footerSection payments">
                    <h4>Métodos de pago</h4>
                    <ul>
                        <li><a><img src="img/mastercard.png" alt="mastercard" class="mastercard"></a></li>
                        <li><a><img src="img/visa.png" alt="mastercard" class="visa"></a></li>
                    </ul>
                </div>
            </div>
            <div class="footerBottom">
                <p><a href="#">&copy; 2024 MontaTuPC </a>| <a href="#">Términos de Servicio</a> | <a href="#">Política de Privacidad</a></p>
            </div>
        </footer>

    </body>
</html>