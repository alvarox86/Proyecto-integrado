//------------------------------------------

const imagenesElement = document.getElementById('imagenes');
const anteriorButton = document.getElementById('anterior');
const siguienteButton = document.getElementById('siguiente');

const imagenes = [
    'assets/ImgC/fuente.webp',
    'assets/ImgC/grafica.webp',
    'assets/ImgC/m2.webp',
    'assets/ImgC/monitor.webp',
    'assets/ImgC/placa.webp',
    'assets/ImgC/procesador.webp',
    'assets/ImgC/ram.webp',
    'assets/ImgC/raton.webp',
    'assets/ImgC/teclado.webp',
    'assets/ImgC/torre.webp',
];
let indiceActual = 0;
const cantidadImagenes = 3;

function mostrarImagenes() {
    imagenesElement.replaceChildren();

    for (let i = indiceActual; i < indiceActual + cantidadImagenes && i < imagenes.length; i++) {
        const img = document.createElement('img');
        img.src = imagenes[i];
        img.alt = `Imagen ${i + 1}`;
        imagenesElement.appendChild(img);
    }

    anteriorButton.disabled = indiceActual === 0;
    siguienteButton.disabled = indiceActual >= imagenes.length - cantidadImagenes;
}

anteriorButton.addEventListener('click', () => {
    if (indiceActual > 0) {
        indiceActual--;
    }
    mostrarImagenes();
});

siguienteButton.addEventListener('click', () => {
    if (indiceActual < imagenes.length - cantidadImagenes) {
        indiceActual++;
    }
    mostrarImagenes();
});

mostrarImagenes();

const images = [
    { src: 'assets/imgM/1024px-hp-logo-2012-1.webp' },
    { src: 'assets/imgM/corsair-logo.webp' },
    { src: 'assets/imgM/frame-10867-1.webp' },
    { src: 'assets/imgM/image-8.webp' },
    { src: 'assets/imgM/logitech-logo.webp' },
    { src: 'assets/imgM/path4.webp' },
    { src: 'assets/imgM/windows11.webp' },
];

function createDataGrid(images) {
    const dataGrid = document.getElementById('data-grid');

    images.forEach(image => {
        const card = document.createElement('div');
        card.className = 'card';

        const img = document.createElement('img');
        img.src = image.src;

        card.appendChild(img);
        dataGrid.appendChild(card);
    });
}

createDataGrid(images);

const envios = [
    { src: 'assets/imgE/benef-dev-15-ene-v2.webp' },
    { src: 'assets/imgE/benef-dev-24h-1-v2.webp' },
    { src: 'assets/imgE/benef-dev-24h-v2.webp' },
    { src: 'assets/imgE/benef-envio-gratis-v2.webp' },
    { src: 'assets/imgE/benef-gar-solucion-v2.webp' },
    { src: 'assets/imgE/promociones.webp' },
]

function createDataGrod(envios) {
    const data = document.getElementById('data');

    envios.forEach(envio => {
        const card = document.createElement('div');
        card.className = 'card';

        const img = document.createElement('img');
        img.src = envio.src;

        card.appendChild(img);
        data.appendChild(card);
    });
}

createDataGrod(envios);