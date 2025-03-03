const menuToggle = document.getElementById('menu-toggle');
const navbarList = document.querySelector('.navbar-list');
const mainImage = document.getElementById('main-image');
const galleryImages = document.querySelectorAll('.gallery-image');

// Меню
menuToggle.addEventListener('click', () => {
    navbarList.classList.toggle('active');
});

// Замена главной картинки
galleryImages.forEach(image => {
    image.addEventListener('click', () => {
        const newSrc = image.src;
        mainImage.src = newSrc;
    });
});


// Аккордеон
document.addEventListener('DOMContentLoaded', () => {
    const accordionButtons = document.querySelectorAll('.accordion-button');

    accordionButtons.forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;

            // Закрываем все открытые элементы, кроме текущего
            document.querySelectorAll('.accordion-content').forEach(otherContent => {
                if (otherContent !== content) {
                    otherContent.classList.remove('show');
                    otherContent.previousElementSibling.classList.remove('active');
                }
            });

            // Переключаем текущий элемент
            if (content.classList.contains('show')) {
                content.classList.remove('show');
                button.classList.remove('active');
            } else {
                content.classList.add('show');
                button.classList.add('active');
            }
        });
    });
});









