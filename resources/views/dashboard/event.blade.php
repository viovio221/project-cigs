<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    {{-- font awesome CDN link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/event_style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    @foreach ($profile as $item)
        <title>Events | {{ $item->community_name }}</title>
    @endforeach
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class="fa-solid fa-motorcycle"></i>
            @foreach ($profile as $item)
                <span class="text">{{ $item->community_name }}</span>
            @endforeach
        </a>
        <ul class="side-menu top">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            @if (Auth::check() && Auth::user()->role === 'non-member')
                <li class="{{ Request::is('dashboard/membersdata*') ? 'active' : '' }}">
                    <a href="/dashboard/membersdata">
                        <i class='bx bxs-group'></i>
                        <span class="text">Members Data</span>
                    </a>
                </li>
            @endif
            @if (Auth::check())
                @if (Auth::user()->role === 'organizer')
                    <li class="{{ Request::is('dashboard/qrcode/event_register*') ? 'active' : '' }}">
                        <a href="/dashboard/qrcode/event_register">
                            <i class='bx bxs-calendar-check'></i>
                            <span class="text">Scan Event Register</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('dashboard/event*') ? 'active' : '' }}">
                        <a href="/dashboard/event">
                            <i class='bx bxs-book-open'></i>
                            <span class="text">Scan Presence</span>
                        </a>
                    </li>
                @elseif (Auth::user()->role === 'admin' || Auth::user()->role === 'member' || Auth::user()->role === 'non-member')
                    <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}">
                            <i class='bx bxs-dashboard'></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                @endif
            @endif
            @if (Auth::check() && Auth::user()->role === 'member')
                <!-- Jika pengguna adalah member, tampilkan elemen sidebar tambahan -->
                <li class="{{ Request::is('dashboard/event*') ? 'active' : '' }}">
                    <a href="/dashboard/event">
                        <i class='bx bxs-shopping-bag-alt'></i>
                        <span class="text">Events</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/news*') ? 'active' : '' }}">
                    <a href="/dashboard/news">
                        <i class='bx bxs-message-dots'></i>
                        <span class="text">News</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/membersdata*') ? 'active' : '' }}">
                    <a href="/dashboard/membersdata">
                        <i class='bx bxs-group'></i>
                        <span class="text">Members Data</span>
                    </a>
                </li>
            @endif
            @if (Auth::check() && Auth::user()->role === 'admin')
                <li class="{{ Request::is('dashboard/event*') ? 'active' : '' }}">
                    <a href="/dashboard/event">
                        <i class='bx bxs-shopping-bag-alt'></i>
                        <span class="text">Events</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/news*') ? 'active' : '' }}">
                    <a href="/dashboard/news">
                        <i class='bx bxs-message-dots'></i>
                        <span class="text">News</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/membersdata*') ? 'active' : '' }}">
                    <a href="/dashboard/membersdata">
                        <i class='bx bxs-group'></i>
                        <span class="text">Members Data</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/data_crud*') ? 'active' : '' }}">
                    <a href="#">
                        <i class='bx bx-data'></i>
                        <span class="text">CRUD Riders</span>
                    </a>
                </li>
                <li class="side1">
                    <a href="/dashboard/event_crud" class="text2">
                        <i class='bx bx-chevrons-right'></i> <span class="text">Events</span>
                    </a>
                </li>
                <li class="side1">
                    <a href="/dashboard/message_crud" class="text2">
                        <i class='bx bx-chevrons-right'></i> <span class="text">Message</span>
                    </a>
                </li>
                <li class="side1">
                    <a href="/dashboard/commentposts_crud" class="text2">
                        <i class='bx bx-chevrons-right'></i> <span class="text">Comment Posts</span>
                    </a>
                </li>
                <li class="side1">
                    <a href="/dashboard/news_crud" class="text2">
                        <i class='bx bx-chevrons-right'></i> <span class="text">News</span>
                    </a>
                </li>
                <li class="side1">
                    <a href="/dashboard/setting_crud" class="text2">
                        <i class='bx bx-chevrons-right'></i> <span class="text">Setting</span>
                    </a>
                </li>
                <li class="side1">
                    <a href="/dashboard/property_crud" class="text2">
                        <i class='bx bx-chevrons-right'></i> <span class="text">Property</span>
                    </a>
                </li>
                <li class="side1">
                    <a href="/dashboard/membersdata_crud" class="text2">
                        <i class='bx bx-chevrons-right'></i> <span class="text">Confirm User</span>
                    </a>
                </li>
        </ul>
        @endif
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
            <form id="searchForm">
                <div class="form-input">
                    <input type="search" id="searchBox" placeholder="Search...">
                    <button type="submit" id="searchSubmit" class="search-btn"><i
                            class='bx bx-search'></i></button>
                </div>
            </form>

            <a href="/dashboard/message" class="notification" title="message here">
                <i class='bx bxs-edit-alt'></i>
            </a>
            <input type="checkbox" id="switch-mode" hidden style="display: none;">
            <label for="switch-mode" class="switch-mode" title="switch mode"></label>
            @if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'member'))
                <a href="/dashboard/review" class="notification" title="event's review here">
                    <i class='bx bxs-bell'></i>
                </a>
            @endif
            @if (Auth::check() && (Auth::user()->role === 'member' || Auth::user()->role === 'non-member'))
            <a href="{{ route('editprofile.show') }}" class="notification" title="edit profile here">
                <i class='bx bxs-user-circle'></i> </a>
                @endif

        </nav>
        <!-- NAVBAR -->

        <body>

            <section class="package searchable-element" id="package" data-aos="fade-up">
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
                                <div class="package-card searchable-element" data-aos="fade-up" id="package-card">
                                    <figure class="card-banner">
                                        <img src="{{ asset('storage/event_images/' . $item->image) }}" alt="Newss 1"
                                            loading="lazy">
                                    </figure>
                                    <div class="card-content" data-aos="fade-up">
                                        <h3 class="h3 card-title searchable-element">{!! $item->name !!}</h3>
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
                                                    <p class="text searchable-element">{{ $item->date }}</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <br>
                                        <ul>
                                            <li class="card-meta-list">
                                                <div class="meta-box">
                                                    <ion-icon name="location"></ion-icon>
                                                    <p class="text searchable-element">{{ $item->location }}</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-price">
                                        @foreach ($eventdata as $evco)
                                            @if ($evco->event_id == $item->id)
                                                <?php
                                                $kode = $evco->id . '/' . 'wayangriders/' . $evco->password . '';
                                                $filename = 'wayangriders' . $evco->id . '.png';
                                                $path = storage_path('app/public/qrcode_images/' . $filename);
                                                if (auth()->user() && auth()->user()->id == $evco->user->id) {
                                                    require_once 'qrcode/qrlib.php';
                                                    QRcode::png("$kode", $path, 2, 2);
                                                }
                                                ?>
                                                @if (auth()->user() && auth()->user()->id == $evco->user->id)
                                                <center>
                                                    <img src="{{ asset('storage/qrcode_images/' . $filename) }}"
                                                        alt="QR Code" style="width: 50%">
                                                    </center>
                                                @endif
                                            @endif
                                        @endforeach

                                        @php
                                            $showDescriptionRoute = route('event.show', $item->id);
                                        @endphp

                                        <button class="btn btn-secondary searchable-element">
                                            <a href="{{ $showDescriptionRoute }}" style="color: white;">See
                                                Description</a>
                                        </button>

                                        @if (Auth::check() && Auth::user()->role === 'organizer')
                                            <button class="btn btn-secondary searchable-element">
                                                <a href="{{ route('dashboard.qrcode.presence', $item->id) }}"
                                                    title="Scan QR Code Presence" style="color: white;">
                                                    <i class='bx bx-scan'></i> Scan Presence
                                                </a>
                                            </button>
                                            {{-- <button class="btn btn-secondary searchable-element">
                                                <a href="#" title="Take a Photo" style="color: white;">
                                                    <i class='bx bx-photo-album'></i> Take a Picture
                                                </a>
                                            </button> --}}
                                        @endif
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
        </body>

</html>
