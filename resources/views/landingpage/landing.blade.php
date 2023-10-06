<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @foreach ($profile as $item)
        <title>{{ $item->community_name }}</title>
    @endforeach
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

                    <img src="{{ asset('/storage/' . $item->image) }}" alt="Logo" oncontextmenu="return false;">

                </td>
            @endforeach
        </a>
        <form action="" class="search-form">
            <input type="search" name="" placeholder="search in here..." id="searchBox">
            <label for="searchBox"><i class="fas fa-search"></i></label>
            <button type="submit" style="display: none;" id="searchSubmit"></button>
        </form>

        <div class="icon">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-moon" id="theme-btn" title="switch mode"></div>
            @if (Auth::check())
                <!-- Pengguna sudah login -->
                <a href="{{ route('dashboard') }}" title="dashboard">
                    <div class="fas fa-tachometer-alt" id="dashboard-btn"></div>
                </a>
            @else
                <!-- Pengguna belum login -->
                <a href="/profiles/sejarah" title="wayang riders structure">
                    <div class="fas fa-user" id="login-btn"></div>
                </a>
            @endif
            <div class="fas fa-bars" id="menu-btn"
            @if (Auth::check() && (Auth::user()->role === 'non-member'))
            title="login register in here"> @endif</div>

        </div>

        <nav class="navbar">
            @if (Auth::check())
                <!-- Pengguna sudah login -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); confirmLogout();">Logout</a>
                </form>
            @else
                <!-- Pengguna belum login -->
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            @endif
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
        @foreach ($profile as $item)
        <video class="video-slide active box searchable-element"
            src="{{ '/storage/' . $item->video }}" autoplay muted loop></video>
    @endforeach

        <div class="container">

            <h1 class="h1 hero-title searchable-element" data-aos="zoom-in">
                @foreach ($profile as $item)
                    <marquee>{!! $item->slogan !!} <br></marquee>
                @endforeach
            </h1>

            <div class="btn-group" data-aos="zoom-in">

                <button class="btn btn-secondary" data-aos="zoom-in"><a href="#events" style="color: #FFF;">Explore
                        Now!</a></button>
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
    <section class="packages">
        <h1 class="heading  searchable-element" id="events">Ride <span>Adventures</span></h1>
        <div class="box-container searchable-element" id="events">
            @foreach ($events as $event)
                <div class="box" data-aos="fade-up">
                    <div class="image">
                        <img src="{{ asset('storage/event_images/' . $event->image) }}" alt="Events 1">
                    </div>
                    <div class="content">
                        <h3>{!! $event->name !!}</h3>
                        <a href="{{ route('event') }}" class="btn">See More Info</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- end --}}



    {{-- review --}}
    <section class="review" id="review">
        <h1 class="heading searchable-element" id="review">
            events <span>review</span>
        </h1>
        <div class="swiper-container review-slider" data-aos="zoom-in">
            <div class="swiper-wrapper">
                @foreach ($comment_post as $cp)
                    <div class="swiper-slide slide">
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
        <h1 class="heading searchable-element" id="news"><span>News</span></h1>
        <div class="box-container  searchable-element" id="news" data-aos="fade-up">

            @foreach ($news as $nw)
                <div class="box  searchable-element" id="news" data-aos="zoom">
                    <div class="image">
                        <img src="{{ asset('storage/new_images/' . $nw->image) }}" alt="News" loading="lazy">
                    </div>
                    <div class="content">
                        <h3>{!! $nw->title !!}</h3>
                        <a href="/dashboard/news" class="btn">Learn More</a>
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
        <div class="box-container searchable-element" id="communities">
            <div class="box">
                <h3>Our Communities</h3>
                <ul>
                    @foreach ($users->take(4) as $item)
                        <li>
                            <a href=""><i class="fas fa-map-marker-alt"></i>{{ $item->province }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="box searchable-element" id="social-media">
                <h3>Follow Us</h3>
                @foreach ($properties as $item)
                    <a href="#" style="text-transform: none;"><i
                            class="fas fa-phone"></i>{{ $item->phone_number }}</a>
                    <a href="https://www.instagram.com/wayang_riders/" style="text-transform: none;"><i
                            class="fa-brands fa-instagram"></i>{{ $item->instagram }}</a>
                    <a href="#" style="text-transform: none;"><i
                            class="fa-brands fa-facebook-f"></i>{{ $item->facebook }}</a>
                    <a href="https://twitter.com/wayangriders" style="text-transform: none;"><i
                            class="fa-brands fa-x-twitter"></i>{{ $item->twitter }}</a>
                    <a href="mailto:wayangriders@gmail.com" style="text-transform: none;">
                        <i class="fa-regular fa-envelope"></i></i>{{ $item->email }}</a>

                @endforeach
            </div>
        </div>
        @foreach ($profile as $pf)
            <div class="credit">{{ $pf->community_name }} <span>| all rights reserved</span>
            </div>
        @endforeach
    </section>
    {{-- ends --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            delay: 600
        });
    </script>
    <script src="js/script.js"></script>
    <script type="text/javascript"></script>
    <script>
        const searchBox = document.getElementById('searchBox');
        const searchSubmit = document.getElementById('searchSubmit');
        let alertShown = false;

        searchSubmit.addEventListener('click', (e) => {
            e.preventDefault();
            const searchTerm = searchBox.value.toLowerCase();

            if (searchTerm === '') {
                return;
            }

            removeHighlights();

            const textElements = document.querySelectorAll('.searchable-element');

            let found = false;
            let firstMatchId = null;

            textElements.forEach((element) => {
                const text = element.innerText.toLowerCase();
                const regex = new RegExp(searchTerm, 'gi');

                if (regex.test(text)) {
                    found = true;
                    const highlightedText = element.innerHTML.replace(
                        regex,
                        '<span class="highlight">$&</span>'
                    );
                    element.innerHTML = highlightedText;

                    if (!firstMatchId) {
                        firstMatchId = element.getAttribute('id');
                    }
                }
            });

            if (found) {
                if (firstMatchId) {
                    window.location.href = `#${firstMatchId}`;
                }
            } else {
                if (!alertShown) {
                    Swal.fire('Sorry!', 'No results for this search!', 'info');
                    alertShown = true;
                } else {
                    alertShown = false;
                }
            }
        });

        function removeHighlights() {
            const highlightedElements = document.querySelectorAll('.highlight');
            highlightedElements.forEach((element) => {
                element.outerHTML = element.innerHTML;
            });
        }
    </script>
    <script>
    function confirmLogout() {
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
            document.getElementById('logout-form').submit();
        }
    });
}

</script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')
</body>

</html>
