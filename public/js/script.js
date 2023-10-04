// Tambahkan event listener ke elemen yang sudah ada di halaman
document.addEventListener('DOMContentLoaded', function () {
    // Memeriksa elemen navbar
    let navbar = document.querySelector('.navbar');

    // Memeriksa elemen formulir login
    let loginForm = document.querySelector('.login-form');

    // Memeriksa elemen formulir pencarian
    let searchForm = document.querySelector('.search-form');

    // Memeriksa elemen tombol tema
    let themeBtn = document.querySelector('#theme-btn');

    // Tambahkan event listener untuk mengatasi klik pada tombol menu
    document.querySelector('body').addEventListener('click', function (event) {
        if (event.target.id === 'menu-btn') {
            navbar.classList.toggle('active');
            if (searchForm) searchForm.classList.remove('active');
            if (loginForm) loginForm.classList.remove('active');
        }

        if (event.target.id === 'login-btn') {
            if (loginForm) loginForm.classList.toggle('active');
            navbar.classList.remove('active');
            if (searchForm) searchForm.classList.remove('active');
        }

        if (event.target.id === 'search-btn') {
            if (searchForm) searchForm.classList.toggle('active');
            navbar.classList.remove('active');
            if (loginForm) loginForm.classList.remove('active');
        }
    });

    // Ketika terjadi pengguliran (scrolling)
    window.onscroll = () => {
        navbar.classList.remove('active');
        if (searchForm) searchForm.classList.remove('active');
        if (loginForm) loginForm.classList.remove('active');
    };

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
});
