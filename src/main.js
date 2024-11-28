const imagenesElement = document.getElementById('imagenes');
const anteriorButton = document.getElementById('anterior');
const siguienteButton = document.getElementById('siguiente');

const imagenes = [
    'img/carrito.png',
    'img/login.png',
    'img/logo.png',
    'img/carrito.png',
    'img/login.png',
    'img/logo.png',
    'img/carrito.png',
    'img/login.png',
    'img/logo.png',
];

let indiceActual = 0;
const cantidadImagenes = 3; // Cantidad de imágenes visibles

function mostrarImagenes() {
    // Remove all child elements
    imagenesElement.replaceChildren();

    // Add the new images
    for (let i = indiceActual; i < indiceActual + cantidadImagenes && i < imagenes.length; i++) {
        const img = document.createElement('img');
        img.src = imagenes[i];
        img.alt = `Imagen ${i + 1}`;
        imagenesElement.appendChild(img);
    }

    // Update the button states
    anteriorButton.disabled = indiceActual === 0;
    siguienteButton.disabled = indiceActual >= imagenes.length - cantidadImagenes;

    // Add the animation class
    imagenesElement.classList.add('animate');
    setTimeout(() => {
        imagenesElement.classList.remove('animate');
    }, 500);
}

// Navegar a la imagen anterior
anteriorButton.addEventListener('click', () => {
    if (indiceActual > 0) {
        indiceActual--;
    }
    mostrarImagenes();
});

// Navegar a la imagen siguiente
siguienteButton.addEventListener('click', () => {
    if (indiceActual < imagenes.length - cantidadImagenes) {
        indiceActual++;
    }
    mostrarImagenes();
});

// Inicializar el carrusel
mostrarImagenes();