<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    {{-- font awesome CDN link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    {{-- custom css file cdn link --}}
    <link rel="stylesheet" href="{{ asset('css/event_style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <title>Events</title>
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class="fa-solid fa-motorcycle"></i>
            <span class="text">Wayang Riders</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="/dashboard">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="/dashboard/event">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Events</span>
                </a>
            </li>
            <li>
                <a href="/dashboard/news">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">News</span>
                    {{-- admin --}}
                </a>
            </li>
            <li>
                <a href="/dashboard/membersdata">
                    <i class='bx bxs-group'></i>
                    <span class="text">Member Data</span>
                </a>
            </li>
            <li>
                <a href="/dashboard/data_crud">
                    <i class='bx bxs-group'></i>
                    <span class="text">CRUD Riders</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const logoutButton = document.querySelector('.logout');

                logoutButton.addEventListener('click', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Are you sure to logout?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ffa500',
                        cancelButtonColor: '#DB504A',
                        confirmButtonText: 'Yes, logout'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '{{ route('logout') }}';
                        }
                    });
                });
            });
        </script>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Cari...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden style="display: none;">
            <label for="switch-mode" class="switch-mode"></label>
            <a href="/dashboard/review" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="{{ route('editprofile.show') }}" class="profile">
                <img src="{{ asset('images/devani.jpg') }}">
            </a>

        </nav>
        <!-- NAVBAR -->

        <body>

            <section class="package" id="package" data-aos="fade-up">
                <div class="container">
                    <h2 class="h2 section-title" data-aos="fade-up">Exciting Events Adventures!</h2>
                    <p class="section-text" data-aos="fade-up">
                        We proudly invite you to explore a series of exciting events we have prepared. From epic road
                        adventures to quality gatherings with fellow motor enthusiasts, we have everything you're
                        looking for. Get ready to feel the thrill of freedom around every corner and celebrate the
                        spirit of community with us. Let's create unforgettable memories together at every event we
                        organize. Don't miss this opportunity to be part of an extraordinary motorbike journey!</p>
                    <ul class="package-list" data-aos="fade-up">
                        @foreach ($events as $item)
                            <li>
                                <div class="package-card" data-aos="fade-up">
                                    <figure class="card-banner">
                                        <img src="{{ asset('storage/event_images/' . $item->image) }}" alt="Events 1"
                                            loading="lazy">
                                    </figure>
                                    <div class="card-content" data-aos="fade-up">
                                        <h3 class="h3 card-title">{!! $item->name !!}</h3>
                                        <p class="card-text">
                                            {{-- Lokasi : {!! $item->location !!} --}}
                                        </p>
                                        <p class="card-text">
                                            {{-- {!! $item->date !!} --}}
                                        </p>
                                        <ul class="card-meta-list">
                                            <li class="card-meta-item">
                                                <div class="meta-box">
                                                    <ion-icon name="time"></ion-icon>
                                                    <p class="text">{{ $item->date }}</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="card-meta-list">
                                                <div class="meta-box">
                                                    <ion-icon name="people"></ion-icon>
                                                    <p class="text">{{ $item->location }}</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="card-meta-list">
                                                <div class="meta-box">
                                                    <ion-icon name="location"></ion-icon>
                                                    <p class="text">{{ $item->location }}</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-price">
                                        <div class="wrapper">
                                            <p class="reviews">(11 Ulasan)</p>
                                            <div class="card-rating">
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                            </div>
                                        </div>
                                        <button class="btn btn-secondary"><a href="/dashboard/eventdesc1"
                                                style="color: white;">Lihat Deskripsi</a></button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul> <br><br>
                    <a href="#top" class="go-top" data-go-top>
                        <ion-icon name="chevron-up-outline"></ion-icon>
                    </a>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
                    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
                    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
                    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
                    <script src="https://unpkg.com/your-package@your-version/dist/script.js"></script>
                    <script>
                        AOS.init({
                            duration: 800,
                            delay: 600
                        });
                    </script>
                    <script type="text/javascript">
                        //Javacript for video slider navigation
                        const btns = document.querySelectorAll(".nav-btn");
                        const slides = document.querySelectorAll(".video-slide");
                        const contents = document.querySelectorAll(".container");
                        var sliderNav = function(manual) {
                            btns.forEach((btn) => {
                                btn.classList.remove("active");
                            });
                            slides.forEach((slide) => {
                                slide.classList.remove("active");
                            });
                            contents.forEach((content) => {
                                content.classList.remove("active");
                            });
                            contents.forEach((content) => {
                                content.classList.remove("active");
                            });
                            btns[manual].classList.add("active");
                            slides[manual].classList.add("active");
                            contents[manual].classList.add("active");
                        }
                        btns.forEach((btn, i) => {
                            btn.addEventListener("click", () => {
                                sliderNav(i);
                            });
                        });
                    </script>
            </section>
            <!-- CONTENT -->
            <script src="{{ asset('js/dashboard.js') }}"></script>
            @include('sweetalert::alert')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </body>

</html>
