<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Description | Wayang Riders</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="{{ asset('css/comment_post.css') }}">

</head>

{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @foreach ($profile as $item)
        <title>Dashboard | {{ $item->community_name }}</title>
    @endforeach
</head> --}}

<body>
 <!-- SIDEBAR -->
 <section id="sidebar">
    <a href="#" class="brand">
        <i class="fa-solid fa-motorcycle"></i>
        @foreach ($profiles as $item)
            <span class="text">{{ $item->community_name }}</span>
        @endforeach
    </a>
    <ul class="side-menu top">
        @if (Auth::check())
            @if (Auth::user()->role === 'organizer')
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class='bx bxs-dashboard'></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/qrcode/event_register*') ? 'active' : '' }}">
                    <a href="dashboard/qrcode/event_register">
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
        @elseif (Auth::check() && Auth::user()->role === 'non-member')
            <li class="{{ Request::is('dashboard/news*') ? 'active' : '' }}">
                <a href="/dashboard/news">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">News</span>
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
                    <input type="search" id="searchBox" placeholder="Cari...">
                    <button type="submit" id="searchSubmit" class="search-btn"><i class='bx bx-search'></i></button>
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
                <i class='bx bxs-user-circle'></i>       </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Detail Comment Post</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="/dashboard/news">Back to News</a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
        <!-- MAIN -->
        <br>
        <br>
        <br>

        <div class="container mt-5">
            <center><h1>Detail Comment Post</h1></center>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $comment_post->username }}</h5>
                    <p class="card-text"><strong>Event Name:</strong> {{ $comment_post->event ? $comment_post->event->name : 'Event Not Found' }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $comment_post->content }}</p>
                    <p class="card-text"><strong>Rating:</strong>  {{ $comment_post->rating }}</p>
                </div>
            </div>
            <form action="{{ route('dashboard.commentposts_crud') }}">
                <div class="mb-3 d-grid">
                    <center><button type="submit" class="btn1 btn-warning" style="border-radius:20px"><b style="color: white">BACK</b></button></center>
                </div>
            </form>
        </div>

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
        <!-- CONTENT -->
        <script src="{{ asset('js/dashboard.js') }}"></script>
        @include('sweetalert::alert')
        <!-- CONTENT -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        @include('sweetalert::alert')
</body>

</html>
