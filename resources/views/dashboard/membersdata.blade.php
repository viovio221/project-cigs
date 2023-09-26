<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">

    <title>Members Data</title>
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
                    <a href="dashboard/data_crud">
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
            <a href="/dashboard/message" class="notification">
                <i class='bx bxs-edit-alt'></i>
            </a>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>

            @if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'member'))
                <a href="/dashboard/review" class="notification">
                    <i class='bx bxs-bell'></i>
                    <span class="num">8</span>
                </a>
            @endif
            <a href="{{ route('editprofile.show') }}" class="profile">
                <img src="{{ asset('images/devani.jpg') }}">
            </a>

        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Members Data</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="/">Landing Page</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container-member">
                <div class="content-container">
                    @if (isset($users))
                        <table class="user-list">
                            <thead>
                                <tr>
                                    <th class="bar">No</th>
                                    <th class="bar">Name</th>
                                    <th class="bar">Email</th>
                                    <th class="bar">Status</th>
                                    <th class="bar">Create At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $usr)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $usr->name }}</td>
                                        <td>{{ $usr->email }}</td>
                                        <td>{{ $usr->role }}</td>
                                        <td>{{ $usr->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
        @include('sweetalert::alert')
</body>

</html>
