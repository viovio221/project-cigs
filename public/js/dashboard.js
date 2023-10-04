document.addEventListener('DOMContentLoaded', function () {
    // Memeriksa apakah elemen yang diharapkan ada di halaman
    const sidebar = document.getElementById('sidebar');
    const menuBar = document.querySelector('#content nav .bx.bx-menu');
    const searchButton = document.querySelector('#content nav form .form-input button');
    const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
    const searchForm = document.querySelector('#content nav form');
    const switchMode = document.getElementById('switch-mode');

    if (!sidebar || !menuBar || !searchButton || !searchButtonIcon || !searchForm || !switchMode) {
        console.error('One or more elements not found in the page.');
        return; // Keluar dari fungsi jika elemen-elemen tidak ditemukan.
    }

    const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

    allSideMenu.forEach(item => {
        const li = item.parentElement;

        item.addEventListener('click', function () {
            allSideMenu.forEach(i => {
                i.parentElement.classList.remove('active');
            })
            li.classList.add('active');
        })
    });

    // TOGGLE SIDEBAR
    menuBar.addEventListener('click', function () {
        sidebar.classList.toggle('hide');
    });

    searchButton.addEventListener('click', function (e) {
        if (window.innerWidth < 576) {
            e.preventDefault();
            searchForm.classList.toggle('show');
            if (searchForm.classList.contains('show')) {
                searchButtonIcon.classList.replace('bx-search', 'bx-x');
            } else {
                searchButtonIcon.classList.replace('bx-x', 'bx-search');
            }
        }
    });

    if (window.innerWidth < 768) {
        sidebar.classList.add('hide');
    } else if (window.innerWidth > 576) {
        searchButtonIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }

    window.addEventListener('resize', function () {
        if (this.innerWidth > 576) {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
            searchForm.classList.remove('show');
        }
    });

    const bodyElement = document.body; // Mendapatkan elemen body

    switchMode.addEventListener('change', function () {
        if (this.checked) {
            bodyElement.classList.add('dark'); // Menambahkan kelas 'dark' pada body
        } else {
            bodyElement.classList.remove('dark'); // Menghapus kelas 'dark' dari body
        }
    });

    switchMode.addEventListener('change', function () {
        if (this.checked) {
            document.body.classList.add('dark');
        } else {
            document.body.classList.remove('dark');
        }
    });
});
