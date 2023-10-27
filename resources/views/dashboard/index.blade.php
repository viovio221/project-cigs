<!DOCTYPE html>
<html lang="en">

<head>
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
            <form action="#" class="search-form" hidden>
                <div class="form-input">
                    <input type="search" placeholder="Search..." class="search-input">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <a href="/dashboard/message" class="notification" title="message here">
                <i class='bx bxs-edit-alt'></i>
            </a>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode" title="switch mode"></label>

            @if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'member'))
                <a href="/dashboard/review" class="notification" title="event's review here">
                    <i class='bx bx-calendar-star'></i>
                </a>
            @endif
            @if (Auth::check() && (Auth::user()->role === 'member' || Auth::user()->role === 'non-member'))
            <a href="{{ route('editprofile.show') }}" class="notification" title="edit profile here">
                <i class='bx bxs-user-circle'></i> </a>
                @endif

        </nav>

        <!-- NAVBAR -->

        <!-- MAIN -->
        <main class="membersdata">
            <div class="head-title">
                <div class="left">
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <h1>Admin Dashboard</h1>
                    @endif
                    <ul class="breadcrumb">
                        <li>
                            <a class="active" href="/" title="Back to Landing Page">Landing Page</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="/dashboard" title="Dashboard here..">Dashboard</a>
                        </li>
                        @if (auth()->user()->role == 'non-member')
                            @if (!auth()->user()->date_birth)
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Swal.fire({
                                            title: 'Complete Your Profile',
                                            text: 'Please complete your profile!',
                                            icon: 'warning',
                                            confirmButtonText: 'Ok'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = "{{ route('editprofile.edit') }}";
                                            }
                                        });
                                    });
                                </script>
                            @endif

                        @endif
                    </ul>
                </div>
            </div>
            @if (Auth::check() && Auth::user()->role === 'organizer')
                <ul class="box-info" style="align-content: center">
                    <li>
                        <i class='bx bxs-calendar-check'></i>
                        <span class="text">
                            <h3><a href="/dashboard/qrcode/event_register">Scan Register Event</a></h3>
                        </span>
                    </li>
                </ul>
                <ul class="box-info" style="align-content: center">
                    <li>
                        <i class='bx bxs-book-open'></i>
                        <span class="text">
                            <h3><a href="/dashboard/event">Scan Presence Event</a></h3>
                        </span>
                    </li>

                </ul>
            @elseif (Auth::check() && Auth::user()->role === 'non-member' )
                <ul class="box-info" style="align-content: center">
                    <li>
                        <i class='bx bxs-news'></i>
                        <span class="text">
                            <h3>{{ $newsCount }}</h3>
                            <p>News Update</p>
                        </span>
                    </li>
                </ul>
                @elseif (Auth::check() && Auth::user()->role === 'member' )
                <ul class="box-info" style="align-content: center">
                    <li>
                        <i class='bx bxs-group'></i>
                        <span class="text">
                            <h3>{{ $memberCount }}</h3>
                            <p>Member Club</p>
                        </span>
                    </li>
                </ul>
                    <ul class="box-info" style="align-content: center">
                        <li>
                            <i class='bx bxs-book-open'></i>
                            <span class="text">
                                <h3>{{ $eventCount }}</h3>
                                <p>New Event</p>
                            </span>
                        </li>
                    </ul>
                    <ul class="box-info" style="align-content: center">
                        <li>
                            <i class='bx bxs-news'></i>
                            <span class="text">
                                <h3>{{ $newsCount }}</h3>
                                <p>News Update</p>
                            </span>
                        </li>
                    </ul>
            @else
                <ul class="box-info" style="align-content: center">
                    <li>
                        <i class='bx bxs-group'></i>
                        <span class="text">
                            <h3>{{ $memberCount }}</h3>
                            <p>Member Club</p>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-calendar-check'></i>
                        <span class="text">
                            <h3>{{ $nonMemberCount }}</h3>
                            <p>New Request</p>
                        </span>
                    </li>
                </ul>
                <ul class="box-info" style="align-content: center">
                    <li>
                        <i class='bx bxs-book-open'></i>
                        <span class="text">
                            <h3>{{ $eventCount }}</h3>
                            <p>New Event</p>
                        </span>
                    </li>

                    <li>
                        <i class='bx bxs-news'></i>
                        <span class="text">
                            <h3>{{ $newsCount }}</h3>
                            <p>News Update</p>
                        </span>
                    </li>
                </ul>
                @if (Auth::check() && Auth::user()->role === 'admin')
                    <div class="table-data">
                        <div class="order">
                            <div class="head">
                                <h3>New Event's Data</h3>
                            </div>
                            <div class="table-data">
                                <div class="order">
                                    <i class='bx bx-search'></i>
                                    <i class='bx bx-filter'></i>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Members Name</th>
                                            <th>Event Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($eventData))
                                            @foreach ($eventData as $data)
                                                <tr>
                                                    <th></th>
                                                    <td>{{ ucwords($data->user->name) }}</td>
                                                    <td>{{ ucwords($data->event->name) }}</td>
                                                    <td><span class="status pending">{{ $data->status }}</span></td>
                                                    <td class="side-menu top">
                                                        <form action="{{ route('event.destroy', $data->id) }}"
                                                            method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                style="background: none; border: none; color:red"
                                                                onclick="return confirm('Are you sure you want to delete this data?')">
                                                                <i class='bx bx-trash'></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <div class="table-data">
                            <div class="order">
                                <div class="head">
                                    <h3>Event Barcode's Data</h3>
                                </div>
                                <div class="table-data">
                                    <div class="order">
                                        <i class='bx bx-search'></i>
                                        <i class='bx bx-filter'></i>
                                    </div>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th style>No</th>
                                                <th style>QR Code</th>
                                                <th style>Name</th>
                                                <th style>Pass</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $usr)
                                                <tr>
                                                    <th></th>
                                                    <td>{{ $usr->id }}</td>
                                                    <td>
                                                        <?php
                                                        $kode = $usr->id . '/' . 'wayangriders/' . $usr->password . '';
                                                        require_once 'qrcode/qrlib.php';
                                                        $filename = 'wayangriders' . $usr->id . '.png';
                                                        $path = storage_path('app/public/qrcode_images/' . $filename);
                                                        QRcode::png("$kode", $path, 2, 2);
                                                        ?>
                                                        <img src="{{ asset('storage/qrcode_images/' . $filename) }}"
                                                            alt="">
                                                    </td>
                                                    <td>{{ ucwords($usr->name) }}</td>
                                                    <td>{{ str_repeat('*', strlen($usr->password)) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endif
            @if (Auth::check() && Auth::user()->role === 'admin')
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Presence Barcode's Data</h3>
                        </div>
                        <div class="table-data">
                            <div class="order">
                                <i class='bx bx-search'></i>
                                <i class='bx bx-filter'></i>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th style>No</th>
                                        <th style>QR Code</th>
                                        <th style>Event Name</th>
                                        <th style=>Member</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eventdata as $evco)
                                        <tr>
                                            <th></th>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <?php
                                                $kode = $evco->id . '/' . 'wayangriders/' . $evco->password . '';
                                                require_once 'qrcode/qrlib.php';
                                                $filename = 'wayangriders' . $evco->id . '.png';
                                                $path = storage_path('app/public/presence_images/' . $filename);
                                                QRcode::png("$kode", $path, 2, 2);
                                                ?>
                                                <img src="{{ asset('storage/presence_images/' . $filename) }}"
                                                    alt="">
                                            </td>
                                            <td>{{ ucwords($evco->event->name) }}</td>
                                            <td>{{ $evco->user->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::check() && Auth::user()->role === 'organizer')
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>New Event Data</h3>
                        </div>
                        <div class="table-data">
                            <div class="order">
                                <i class='bx bx-search'></i>
                                <i class='bx bx-filter'></i>
                            </div>

                            @if (isset($eventdata) && count($eventdata) > 0)
                                <table>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Event Name</th>
                                            <th>Checkin Participants</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($eventdata as $data)
                                            <tr>
                                                <th></th>
                                                <td>{{ ucwords($data->event->name) }}</td>
                                                <td>{{ ucwords($data->user->name) }}</td>
                                                <td><span class="status pending">{{ $data->status }}</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No event data available for this organizer.</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @include('sweetalert::alert')

</body>

</html>
