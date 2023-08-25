// Memilih elemen navbar
let navbar = document.querySelector('.navbar');

// Ketika tombol menu di klik
document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
}

// Memilih elemen formulir login
let loginForm = document.querySelector('.login-form');

// Ketika tombol login di klik
document.querySelector('#login-btn').onclick = () => {
    loginForm.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
}

// Memilih elemen formulir pencarian
let searchForm = document.querySelector('.search-form');

// Ketika tombol pencarian di klik
document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
}

// Ketika terjadi pengguliran (scrolling)
window.onscroll = () => {
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
}

// Memilih tombol tema
let themeBtn = document.querySelector('#theme-btn');

// Ketika tombol tema di klik
themeBtn.onclick = () => {
    themeBtn.classList.toggle('fa-sun');
    if (themeBtn.classList.contains('fa-sun')) {
        document.body.classList.add('active');
    } else {
        document.body.classList.remove('active');
    }
};

// Inisialisasi Swiper untuk slider ulasan
var swiper = new Swiper(".review-slider", {
    loop: true,
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
    },
});
