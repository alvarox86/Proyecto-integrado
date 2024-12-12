//Importamos las keys de la API de stripe
import KEYS from "../../assets/Keys.js";

let allContainerCart = document.querySelector('.componentes');//Añade a la variable allContainerCart el contenido del elemento componentes
let containerBuyCart = document.querySelector('.card-items');
let priceTotal = document.querySelector('.price-total')
let amountProduct = document.querySelector('.count-product');

let buyThings = [];
let totalCard = 0;
let countProduct = 0;

loadEventListenrs();
function loadEventListenrs(){
    allContainerCart.addEventListener('click', addProduct);//Llama a la función addProduct cuando hacemos click en el botón

    containerBuyCart.addEventListener('click', deleteProduct);//Llama a la función deleteProduct cuando hacemos click en el botón
}

function addProduct(e){ //Función encargada de añadir productos al carrito
    e.preventDefault();

    if (e.target.classList.contains('addCart')) {
        const selectProduct = e.target.parentElement; 
        readTheContent(selectProduct);
    }
}

function deleteProduct(e) { //Función para eliminar productos del carrito
    if (e.target.classList.contains('delete-product')) {
        const deleteId = e.target.getAttribute('data-id');
        buyThings.forEach(value => {
            if (value.id == deleteId) {
                let priceReduce = parseFloat(value.price) * parseFloat(value.amount);
                totalCard =  totalCard - priceReduce;
                totalCard = totalCard.toFixed(2);
            }
        });
        buyThings = buyThings.filter(product => product.id !== deleteId);
        
        countProduct--;
    }
    //El contador se quedaba con "1" aunque hubiera 0 productos y el precio total no se actualizaba a 0
        if (buyThings.length === 0) {
        priceTotal.innerHTML = 0;
        amountProduct.innerHTML = 0;
    }
    loadHtml();
}

//--------------------------------------------------------------------------------------------

const $d = document;
const $componentes = $d.getElementById("componentes");
const $template = $d.getElementById("comp-template").content;
const $fragment = $d.createDocumentFragment();
const options = {headers: {Authorization: `Bearer ${KEYS.secret}`}}
const FormatoDeMoneda = num => `${num.slice(0, -2)}.${num.slice(-2)}€`;

let prdcts, prices;

Promise.all([
    fetch("https://api.stripe.com/v1/products", options),
    fetch("https://api.stripe.com/v1/prices", options)
])

.then(responses => Promise.all(responses.map(res => res.json())))
.then(json => {
    prdcts = json[0].data;
    prices = json[1].data;

    prices.forEach(el => {
        let productDta = prdcts.filter(prdct => prdct.id === el.product)
        window.productDta = productDta;

        $template.querySelector(".componente").setAttribute("data-price", el.id);
        $template.querySelector("img").src = productDta[0].images[0];
        $template.querySelector("img").alt = productDta[0].name;
        $template.querySelector("figcaption").innerHTML = `${productDta[0].name}`;
        $template.querySelector("p").innerHTML = `${FormatoDeMoneda(el.unit_amount_decimal)}`;
        $template.querySelector("a").setAttribute("data-id",el.id);

        let $clone = $d.importNode($template, true);

        $fragment.appendChild($clone);
    })  
    $componentes.appendChild($fragment);    
})
.catch(error => {
    let message = error.statuText || "Ocurrió un error en la petición";

    $componentes.innerHTML = `Error: ${message}`;
})
console.log(options.prices);
console.log(options.prodcts);

const cartItems = []; // Array para almacenar los productos del carrito

$d.addEventListener("click", e => {
    // Agregar producto al carrito
    if (e.target.matches(".addCart")) {
        const priceId = e.target.getAttribute("data-id");
        const quantity = 1;

        // Verificar si el producto ya está en el carrito
        const existingItem = cartItems.find(item => item.priceId === priceId);
        if (existingItem) {
            existingItem.quantity += quantity; // Aumentar la cantidad si ya existe
        } else {
            cartItems.push({ priceId, quantity }); // Agregar nuevo producto al carrito
        }
        console.log(cartItems);
    }

    if (e.target.matches(".delete-product")) { //Funcion para eliminar los producto del array donde se alojaban los producto que se iban a comprar
        const priceId = e.target.getAttribute("data-id");

        const itemIndex = cartItems.findIndex(item => item.priceId === priceId);
        if (itemIndex > -1) {
            cartItems.splice(itemIndex, 1); // Eliminar el producto del carrito
        }
    }

    // Realizar pedido
    if (e.target.matches(".realizarPedido ")) {
        // Crear un array de lineItems a partir de cartItems
        const lineItems = cartItems.map(item => ({
            price: item.priceId,
            quantity: item.quantity
        }));

        // Crear sesión de checkout
        Stripe(KEYS.public).redirectToCheckout({
            lineItems: lineItems,
            mode: "payment",
            successUrl: "http://localhost/PPI/src/assets/succes.php",
            cancelUrl: "http://localhost/PPI/src/assets/cancel.php"
        })
        .then(res => {
            if (res.error) {
                $componentes.insertAdjacentElement("afterend", res.error.message);
            }
        });
    }
});

//-------------------------------------------------------------------------------------------

function readTheContent(product){//Funcion que se encarga de leer el contenido de los productos para mostrarlo en el carrito
    const infoProduct = {
        image: product.querySelector("img").src,
        title: product.querySelector("img").alt,
        price: product.querySelector("p").textContent,
        id: product.querySelector("a").getAttribute("data-id"),
        amount: 1
    }
    totalCard = parseFloat(totalCard) + parseFloat(infoProduct.price);
    totalCard = totalCard.toFixed(2);

    const exist = buyThings.some(product => product.id === infoProduct.id);
    if (exist) {
        const pro = buyThings.map(product => {
            if (product.id === infoProduct.id) {
                product.amount++;
                return product;
            } else {
                return product
            }
        });
        buyThings = [...pro];
    } else {
        buyThings = [...buyThings, infoProduct]
        countProduct++;
    }

loadHtml();
}

function loadHtml(){//Funcion para cargar el desplegable del carrito
    clearHtml();
    buyThings.forEach(product => {
        const {image, title, price, amount, id} = product;
        const row = document.createElement('div');
        row.classList.add('item');
        row.innerHTML = 
        `    <img src="${image}" alt="">
            <div class="item-content">
                <h5>${title}</h5>
                <h5 class="cart-price">${price}</h5>
                <h6>Amount: ${amount}</h6>
            </div>
            <span class="delete-product" data-id="${id}">X</span>`;

        containerBuyCart.appendChild(row);

        priceTotal.innerHTML = totalCard;

        amountProduct.innerHTML = countProduct;
    });
    
}
 function clearHtml(){
    containerBuyCart.innerHTML = '';
 }
