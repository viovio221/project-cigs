<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Komunitas Motor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    {{-- font awesome CDN link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    {{-- custom css file cdn link --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>

<body>

    {{-- header section mulai --}}
    <header class="header">
        <a href="#" class="logo">
            @foreach ($profile as $item)
            <td>
                <img src="{{ asset('storage/profile_images/' . $item->image) }}" alt="Logo">
            </td>
            @endforeach
        </a>
        <form action="" class="search-form">
            <input type="search" name="" placeholder="search in here..." id="searchBox">
            <label for="searchBox"><i class="fas fa-search"></i></label>
        </form>
        <div class="icon">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-moon" id="theme-btn"></div>
            <a href="{{ route('sejarah') }}">
                <div class="fas fa-user" id="login-btn"></div>
            </a>

            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

        <nav class="navbar">
            <a href="{{ route('event') }}">Ride Adventure</a>
            <a href="/login">Login</a>
            <a href="/register">Register</a>

        </nav>

        {{-- <form action="" class="login-form">
            <div class="inputBox">
                <span>Username</span>
                <input type="text" placeholder="Masukan Nama Anda">
            </div>

            <div class="inputBox">
                <span>Password</span>
                <input type="password" placeholder="Masukan Kata Sandi Anda">
            </div>

            <div class="remember">
                <input type="checkbox" name="" id="login-remember">
                <label for="login-remember">Ingat Saya</label>
            </div>

            <input type="submit" class="btn" value="login">
        </form> --}}
    </header>
    {{-- header section end --}}

    {{-- beranda --}}
    <section class="hero" id="home">
        <video class="video-slide active" src="{{ asset('videos/video_1.mp4') }}" autoplay muted loop></video>
        <video class="video-slide" src="{{ asset('videos/video_2.mp4') }}" autoplay muted loop></video>
        <video class="video-slide" src="{{ asset('videos/video_3.mp4') }}" autoplay muted loop></video>
        <video class="video-slide" src="{{ asset('videos/video_4.mp4') }}" autoplay muted loop></video>
        <video class="video-slide" src="{{ asset('videos/video_4.mp4') }}" autoplay muted loop></video>
        <div class="container">

            <h1 class="h1 hero-title" data-aos="zoom-in">
                <marquee> Ride Together, Thrive Together <br></marquee>
            </h1>

            <div class="btn-group" data-aos="zoom-in">

                <button class="btn btn-secondary" data-aos="zoom-in"><a href="#kegiatan"
                        style="color: #FFF;">Explore Now!</a></button>
            </div>
            <div class="slider-navigation">
                <div class="nav-btn active"></div>
                <div class="nav-btn"></div>
                <div class="nav-btn"></div>
                <div class="nav-btn"></div>
                <div class="nav-btn"></div>
            </div>
        </div>
    </section>
    {{-- end beranda --}}


    {{-- packages --}}
    <section class="packages" id="kegiatan">
        <h1 class="heading">Ride <span>Adventures</span></h1>
        <div class="box-container">
            @foreach ($events as $item)
                <div class="box" data-aos="fade-up">
                    <div class="image">
                        <img src="{{ asset('storage/event_images/' . $item->image) }}" alt="Events 1">
                    </div>
                    <div class="content">
                        <p><b>{!! $item->name !!}</b></p>
                        <a href="{{ route('event') }}" class="btn">See More Info</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- end --}}



    {{-- review --}}
    <section class="review" id="review">
        <h1 class="heading">
            events <span>review</span>
        </h1>
        <div class="swiper-container review-slider" data-aos="zoom-in">
            <div class="swiper-wrapper">
                @foreach ($comment_post as $cp)
                    <div class="swiper-slide slide">
                        <img src="{{ asset('images/profile-icon-png-912.png') }}" alt="">
                        <h3>{{ $cp->username }}</h3>
                        <p>{{ $cp->content }}</p>
                        <div class="stars">
                            @php
                                $rating = $cp->rating;
                                $maxRating = 5;
                            @endphp
                            @for ($i = 1; $i <= $maxRating; $i++)
                                @if ($i <= $rating)
                                    <i class='bx bxs-star'></i> <!-- Tampilkan bintang yang menyala -->
                                @else
                                    <i class='bx bx-star'></i>
                                    <!-- Tampilkan bintang yang tidak menyala -->
                                @endif
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        </div>
        </div>
    </section>
    {{-- ends --}}

    {{-- blogs --}}
    <section class="blogs" id="others">
        <h1 class="heading"><span>News</span></h1>
        <div class="box-container" data-aos="fade-up">

            @foreach ($news as $nw)
                <div class="box" data-aos="zoom">
                    <div class="image">
                        <img src="{{ asset('storage/new_images/' . $nw->image) }}" alt="Events" loading="lazy">
                    </div>
                    <div class="content">
                        <h3>{!! $nw->title !!}</h3>
                        <a href="#" class="btn">Learn More</a>
                        <div class="icons">
                            <a href="#"><i class="fas fa-user"></i> by admin</a>
                            <a href="#"><i class="fas fa-calendar"></i> {{ $nw->created_at }}</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    {{-- ends --}}
    {{-- footer --}}
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Our Communities</h3>
                <a href="https://www.google.com/maps/search/?api=1&query=Bandung"><i
                        class="fas fa-map-marker-alt"></i>Bandung</a>
                <a href="https://www.google.com/maps/search/?api=1&query=Cimahi"><i
                        class="fas fa-map-marker-alt"></i>Cimahi</a>
                <a href="https://www.google.com/maps/search/?api=1&query=Bogor"><i
                        class="fas fa-map-marker-alt"></i>Bogor</a>
                <a href="https://www.google.com/maps/search/?api=1&query=Pangandaran"><i
                        class="fas fa-map-marker-alt"></i>Pangandaran</a>

            </div>
            <div class="box">
                <h3>Follow Us</h3>
                <a href="#" style="text-transform: none;"><i class="fas fa-phone"></i>+62 89687792980</a>
                    <a href="#" style="text-transform: none;"><i
                            class="fa-brands fa-instagram"></i>wayangriders_id</a>
                    <a href="#" style="text-transform: none;"><i class="fa-brands fa-facebook-f"></i>wayang
                        riders</a>
                    <a href="#" style="text-transform: none;"><i
                            class="fa-brands fa-x-twitter"></i>wayangriders_id</a>
                    <a href="#" style="text-transform: none;"><i
                            class="fa-regular fa-envelope"></i></i>wayangriders@gmail.com</a>
            </div>
        </div>
        <div class="credit">Created by: Wayang Riders Community <span>| all rights reserved</span></div>
    </section>
    {{-- ends --}}
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
    <script src="js/script.js"></script>
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
</body>

</html>
