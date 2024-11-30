<?php
    session_start();
?>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MontaTuPC</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="../../img/logo.png">
    </head>
        <script src="products.js" type="module"></script>
    <body>

    <section class="container">
        
    <section class="componentes" id="componentes"></section>
    
    <template id="comp-template">
        <figure class="componente">
            <img>
            <figcaption></figcaption>
            <p></p>
            <a data-id="" class="addCart">Añadir al carrito</a>
        </figure>
    </template>

        <script>
            function showCart(x){
                document.getElementById("products-id").style.display = "block";
            }
            function closeBtn(){
                document.getElementById("products-id").style.display = "none";
            }
        </script>
    </section>

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
                        <li><a><img src="../../img/mastercard.png" alt="mastercard" class="mastercard"></a></li>
                        <li><a><img src="../../img/visa.png" alt="visa" class="visa"></a></li>
                    </ul>
                </div>
            </div>
            <div class="footerBottom">
                <p><a href="#">&copy; 2024 MontaTuPC </a>| <a href="#">Términos de Servicio</a> | <a href="#">Política de Privacidad</a></p>
            </div>
        </footer>

    </body>
</html>