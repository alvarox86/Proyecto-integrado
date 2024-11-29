<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MontaTuPC</title>
        <link rel="stylesheet" href="main.css">
        <link rel="icon" href="assets/img/logo.png">
    </head>
    <body>
    <script src="main.js"  type="module"></script>
        <header>
                <a href="indexloged.php" class="logo"><img src="assets/img/logo.png" alt="logotipo"></a>
                <a href="Options/Products/products.php" class="productos">Productos</a>
                <a href="Options/BuildPc/build.php" class="montaPc">Monta tu PC</a>
                <a class="carrito"><img src="assets/img/carrito.png" alt="carrito"></a>
                <a href="login/login.php" class="loginButton"><img src="assets/img/login.png" alt="login"><?php echo $_SESSION['correo']; ?></a>                    
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
            <br><br><br><br><br><br>

            <h3>Condiciones de envio</h3>
            <div id="data" class="data"></div>

        </main>
        <footer class="footer">
            <div class="footerContent">
                <div class="footerSection links">
                    <h4>Enlaces rápidos</h4>
                    <ul>
                        <li><a href="indexloged.php">Inicio</a></li>
                        <li><a href="Options/Products/products.php">Catálogo de Componentes</a></li>
                        <li><a href="Options/BuildPc/build.php">Configura tu PC</a></li>
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
                        <li><a><img src="assets/img/mastercard.png" alt="mastercard" class="mastercard"></a></li>
                        <li><a><img src="assets/img/visa.png" alt="visa" class="visa"></a></li>
                    </ul>
                </div>
            </div>
            <div class="footerBottom">
                <p><a href="#">&copy; 2024 MontaTuPC </a>| <a href="#">Términos de Servicio</a> | <a href="#">Política de Privacidad</a></p>
            </div>
        </footer>

    </body>
</html>