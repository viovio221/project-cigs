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

    <title>Admin Dashboard</title>
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
            <li class="active">
                <a href="#">
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
                <a href="/dashboard/membersdata">
                    <i class='bx bxs-group'></i>
                    <span class="text">Members Data</span>
                </a>
            </li>
            <li>
                <a href="/dashboard/data_crud">
                    <i class='bx bx-data'></i> <span class="text">CRUD Riders</span>
                </a>
            </li>
            <li class="side1">
                <a href="/dashboard/data_crud" class="text2">
                    <i class='bx bx-chevrons-right'></i> <span class="text">Events</span>
                </a>
            </li>
            <li class="side1">
                <a href="/dashboard/data_crud" class="text2">
                    <i class='bx bx-chevrons-right'></i> <span class="text">Message</span>
                </a>
            </li>
            <li class="side1">
                <a href="/dashboard/data_crud" class="text2">
                    <i class='bx bx-chevrons-right'></i> <span class="text">Comment Posts</span>
                </a>
            </li>
            <li class="side1">
                <a href="/dashboard/data_crud" class="text2">
                    <i class='bx bx-chevrons-right'></i> <span class="text">News</span>
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
            <form action="#" class="search-form">
                <div class="form-input">
                    <input type="search" placeholder="Search..." class="search-input">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <a href="/dashboard/message" class="notification">
                <i class='bx bxs-edit-alt'></i>
            </a>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>

            <a href="/dashboard/review" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="{{ route('editprofile.show') }}" class="profile">
                <img src="{{ asset('images/devani.jpg') }}" alt="Profile Image">
            </a>
        </nav>

        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Admin Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="/">Landing Page</a>
                        </li>
                    </ul>
                </div>
            </div>

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
                                    <th>Members Name</th>
                                    <th>Event Date</th>
                                    <th>Event Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($eventData))
                                    @foreach ($eventData as $data)
                                        <tr>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->event_date }}</td>
                                            <td>{{ $data->event_name }}</td>
                                            <td><span class="status pending">{{ $data->status }}</span></td>
                                            <td class="side-menu top">
                                                <form action="{{ route('event.destroy', $data->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        style="background: none; border: none; color:red"><i
                                                            class='bx bx-trash'></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/dashboard.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html
