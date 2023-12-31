<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @foreach ($profiles as $item)
        <title>Event Description | {{ $item->community_name }}</title>
    @endforeach
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="{{ asset('css/eventdesc.css') }}">

</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class="fa-solid fa-motorcycle"></i>
            <span class="text">Wayang Riders</span>
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
            @if (Auth::check() && Auth::user()->role === 'member')
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
                <!-- Jika pengguna adalah admin, tampilkan elemen sidebar tambahan -->
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
    <section id="content">
        <nav>
            <i class='bx bx-menu'></i>
            <form id="searchForm">
                <div class="form-input">
                    <input type="search" id="searchBox" placeholder="Cari...">
                    <button type="submit" id="searchSubmit" class="search-btn"><i
                            class='bx bx-search'></i></button>
                </div>
            </form>
            <a href="/dashboard/message" class="notification">
                <i class='bx bxs-edit-alt'></i>
            </a>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="/dashboard/review" class="notification">
                <i class='bx bxs-bell'></i>
            </a>

            <a href="{{ route('editprofile.show') }}" class="notification" title="edit profile here">
                <i class='bx bxs-user-circle'></i> </a>
        </nav>
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Event Description</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="/dashboard/event">Back to Events</a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
        <section class="blog" id="blog" data-aos="fade-up">
            <p class="section-subtitle  searchable-element">Welcome to the Wayang Riders Event</p>
            <h2 class="section-title  searchable-element"> Join Us for Upcoming Events</h2>
            <div class="blog-grid">
                <div class="blog-card  searchable-element" data-aos="zoom">
                    <div class="center-image">
                        <div class="blog-banner-box">
                            <img src="{{ asset('storage/event_images/' . $event->image) }}" alt="Events Image"
                                width="100">
                        </div>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title  searchable-element">
                            <a href="#">
                                {{ $event->name }}
                            </a>
                        </h3>
                        <div class="blog-text  searchable-element">
                            {!! $event->description !!}
                            <p>Lokasi: {{ $event->location }}</p>
                        </div>
                        <div class="wrapper  searchable-element">
                            <div class="blog-publish-date">
                                <i class='bx bx-calendar'></i>
                                <a href="#">
                                    {{ $event->date }}
                                </a>
                            </div>
                            @if (Auth::check() && Auth::user()->role === 'admin')
                                <button class="btn btn-primary" data-event-id="{{ $event->id }}">
                                    {{-- data-event-name="{{ $event->name }}" data-event-date="{{ $event->date }}"> --}}
                                    <div class="container col-lg-3 py-3">
                                        <div class="card bg-white shadow rounded-3 p-3 broder-0">
                                            @if (session()->has('failed'))
                                                <div class="alert alert-warning alert-dismissible fade show"
                                                    role="alert">
                                                    <strong> {{ session()->get('failed') }}</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif

                                            @if (session()->has('success'))
                                                <div class="alert alert-success alert-dismissible fade show"
                                                    role="alert">
                                                    <strong> {{ session()->get('succes') }}</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif
                                            <video id="preview" playsinline></video>
                                            <form action="{{ route('storeForAdmin') }}" method="POST"
                                                id="form">
                                                @csrf
                                                <input type="hidden" name="user_id" id="user_id">
                                                <input type="hidden" name="event_id" id="event_id">
                                            </form>
                                        </div>
                                    </div>

                                    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
                                    <script type="text/javascript">
                                        let scanner = new Instascan.Scanner({
                                            video: document.getElementById('preview')
                                        });
                                        scanner.addListener('scan', function(content) {
                                            console.log(content);
                                        });
                                        Instascan.Camera.getCameras().then(function(cameras) {
                                            if (cameras.length > 0) {
                                                scanner.start(cameras[0]);
                                            } else {
                                                console.error('No cameras found.');
                                            }
                                        }).catch(function(e) {
                                            console.error(e);
                                        });

                                        scanner.addListener('scan', function(c) {
                                            var eventId = document.querySelector('.btn.btn-primary').getAttribute('data-event-id');
                                            document.getElementById('user_id').value = parseInt(c); // Mengonversi 'c' menjadi integer
                                            document.getElementById('event_id').value = eventId;
                                            document.getElementById('form').submit();
                                        })
                                    </script>
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
                                        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
                                    </script>
                                @else
                                    @if ($eventData?->status == "registered")

                                    @else
                                        <button class="btn btn-primary" data-event-id="{{ $event->id }}">
                                            <p class="btn-text"><a href="#" style="color: white;">Register
                                                    Event</a></p>
                                            <span class="square"></span>
                                        </button>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const registerButtons = document.querySelectorAll('.btn.btn-primary');

                                                registerButtons.forEach(registerButton => {
                                                        registerButton.addEventListener('click', function() {
                                                                @auth
                                                                const userId = '{{ auth()->user()->id }}';
                                                            @else
                                                                const userId = null;
                                                            @endauth
                                                            const eventId = registerButton.getAttribute('data-event-id');
                                                            if (navigator.onLine) {
                                                                axios.post(
                                                                    '{{ route('event.register') }}', {
                                                                        user_id: userId,
                                                                        eventId: eventId,
                                                                    }).then((response) => {
                                                                    if (response.data.message ===
                                                                        'You are already registered for this event.') {
                                                                        Swal.fire('You are already registered for this event.',
                                                                            'You cannot register again for the same event.', 'info');
                                                                    } else if (response.data.message === 'Registration successful') {
                                                                        Swal.fire('Thank you!', 'You have registered for this event.',
                                                                            'success');
                                                                        window.location.href =
                                                                            '/dashboard/event';
                                                                    } else {
                                                                        Swal.fire('Error',
                                                                            'An error occurred while registering for the event.',
                                                                            'error');
                                                                    }
                                                                }).catch((error) => {
                                                                    Swal.fire('Error',
                                                                        'An error occurred while registering for the event.',
                                                                        'error');
                                                                });
                                                            } else {
                                                                Swal.fire('Error', 'No connection! Unable to register for the event.',
                                                                    'error');
                                                            }
                                                        });
                                                });
                                            });
                                        </script>
                                    @endif
                                    <div class="blog-comment">
                                        <i class='bx bx-comment-dots'></i>
                                        <a href="/dashboard/review">3 Review</a>
                                    </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Ionicon link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script>
            AOS.init({
                duration: 800,
                delay: 400
            });
        </script>

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
                        window.location.href = #$ {
                            firstMatchId
                        };
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
        <!-- CONTENT -->
        <script src="{{ asset('js/dashboard.js') }}"></script>
        @include('sweetalert::alert')
        <!-- CONTENT -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        @include('sweetalert::alert')
</body>

</html>
