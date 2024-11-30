import KEYS from "../TFG/assets/Keys.js"

const $d = document;
const $prendas= $d.getElementById("prendas");
const $template=$d.getElementById("prenda-template").content;
const $fragment= $d.createDocumentFragment();
const options={headers: {Authorization:`Bearer ${KEYS.secret}`}}
const FormatoDeMoneda = num => `${num.slice(0,-2)}.${num.slice(-2)}€`;

let products, prices;

Promise.all([
    fetch("https://api.stripe.com/v1/products", options),
    fetch("https://api.stripe.com/v1/prices", options)
])
.then(responses => Promise.all(responses.map(res => res.json())))
.then(json => {
    products = json[0].data;
    prices = json[1].data;
    prices.forEach(el => {
        let productData = products.filter(product => product.id === el.product);
        
        $template.querySelector(".prenda").setAttribute("data-price", el.id);
        $template.querySelector("img").src = productData[0].images[0];
        $template.querySelector("img").alt = productData[0].name;
        $template.querySelector("figcaption").innerHTML = `${productData[0].name}`;
        $template.querySelector("p").innerHTML = `${FormatoDeMoneda(el.unit_amount_decimal)}`;
        $template.querySelector("a").setAttribute("data-id",el.id);

        let $clone = $d.importNode($template, true);

        $fragment.appendChild($clone);
    });

    $prendas.appendChild($fragment);
})
.catch(error => {
    let message = error.statuText || "Ocurrió un error en la petición";

    $prendas.innerHTML = `Error: ${error.status}: ${message}`;
})

$d.addEventListener("click", e => {
    if (e.target.matches(".comprarYa ")) {
        let priceId = e.target.parentElement.getAttribute("data-price");

        Stripe(KEYS.public).redirectToCheckout({
            lineItems: [{
                price: priceId,
                quantity: 1
            }],
            mode: "payment",
            successUrl:"http://localhost/TFG/assets/succes.php",
            cancelUrl:"http://localhost/TFG/assets/cancel.php"
        })
        .then(res => {
            if (res.error){
                $prendas.insertAdjacentElement("afterend", res.error.message)
            }
        })
    }
})