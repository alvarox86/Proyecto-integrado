//----------------------------------------------------------------------------------------
let currentIndex = 0;
const images = document.querySelectorAll('.imagenes img');
const totalImages = images.length;

document.getElementById('next').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % totalImages;
    updateCarousel();
});

document.getElementById('prev').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + totalImages) % totalImages;
    updateCarousel();
});

function updateCarousel() {
    const offset = -currentIndex * 100; // Mover el carrusel
    document.querySelector('.imagenes').style.transform = `translateX(${offset}%)`;
}
//----------------------------------------------------------------------------------------