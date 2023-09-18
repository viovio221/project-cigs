<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Description</title>
    <!-- Boxicons -->
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
            <li>
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
                <a href="#">
                    <i class='bx bxs-group'></i>
                    <span class="text">Members Data</span>
                </a>
            </li>
            <li>
                <a href="/dashboard/data_crud">
                    <i class='bx bx-data'></i> <span class="text">CRUD Riders</span>
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

                // Tambahkan event click ke elemen logout
                logoutButton.addEventListener('click', function(e) {
                    e.preventDefault(); // Mencegah tindakan logout asli

                    // Tampilkan pesan konfirmasi SweetAlert2
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
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="{{ route('editprofile.show')}}" class="profile">
                <img src="{{ asset('images/devani.jpg') }}">
            </a>

        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
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
        <!-- MAIN -->

        <section class="blog" id="blog" data-aos="fade-up">

            <p class="section-subtitle">Selamat Datang di Event Wayang Riders</p>

            <h2 class="section-title">Bergabung Dengan Kami Untuk Events Yang Akan Datang</h2>

            <div class="blog-grid">

                <div class="blog-card" data-aos="zoom">

                    <div class="center-image">
                        <div class="blog-banner-box">
                            <img src="{{ asset('storage/event_images/' . $event->image) }}" alt="Events Image" width="100">
                        </div>
                    </div>

                    <div class="blog-content">
                        <h3 class="blog-title">
                            <a href="#">
                                {{ $event->name }}
                            </a>
                        </h3>
                        <div class="blog-text">
                            {!! $event->description !!}
                            <p>Lokasi: {{ $event->location }}</p>
                        </div>
                        <div class="wrapper">
                            <div class="blog-publish-date">
                                <i class='bx bx-calendar'></i>
                                <a href="#">
                                    {{ $event->date }}
                                </a>
                            </div>

                            <!-- ... -->
                            <button class="btn btn-primary" data-event-id="{{ $event->id }}"
                                data-event-name="{{ $event->name }}" data-event-date="{{ $event->date }}">
                                <p class="btn-text"><a href="#" style="color: white;">Daftar Acara</a></p>
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
                                                const eventName = registerButton.getAttribute('data-event-name');
                                                const eventDate = registerButton.getAttribute('data-event-date');

                                                Swal.fire({
                                                    title: 'Are you interested in joining this event?',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#ffa500',
                                                    cancelButtonColor: '#DB504A',
                                                    confirmButtonText: 'Register',
                                                    cancelButtonText: 'Cancel',
                                                    icon: 'question',
                                                    html: `
                                    <p>Nama Pengguna: <strong>{{ auth()->user()->name }}</strong></p>
                                    <p>Judul Acara: <strong>${eventName}</strong></p>
                                    <p>Tanggal Acara: <strong>${eventDate}</strong></p>
                                `
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        axios.post('{{ route('event.register') }}', {
                                                            user_id: userId,
                                                            event_id: eventId,
                                                            eventName: eventName,
                                                            eventDate: eventDate,
                                                        }).then((response) => {
                                                            Swal.fire('Thank you!',
                                                                'You have registered for this event.', 'success');
                                                        }).catch((error) => {
                                                            Swal.fire('Error',
                                                                'An error occurred while registering for the event.',
                                                                'error');
                                                        });
                                                    }
                                                });
                                            });
                                    });
                                });
                            </script>



                            <!-- ... -->

                            <div class="blog-comment">
                                <i class='bx bx-comment-dots'></i>
                                <a href="#">3 Review</a>
                            </div>

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
        <!-- CONTENT -->
        <script src="{{ asset('js/dashboard.js') }}"></script>
        @include('sweetalert::alert')
        <!-- CONTENT -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        @include('sweetalert::alert')
</body>

</html>
