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

    @foreach ($profiles as $item)
    <title>Property CRUD | {{ $item->community_name }}</title>
    @endforeach   </head>

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
                <a href="/dashboard/membersdata">
                    <i class='bx bxs-group'></i>
                    <span class="text">Members Data</span>
                </a>
            </li>
            <li>
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
            <li class="side1 {{ Request::is('dashboard/property_crud*') ? 'active' : '' }}">
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
                    <h1>Property CRUD Riders</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="/dashboard/index">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="/dashboard/property_crud">Property CRUD</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <table>
                        <thead>
                            @if (isset($properties))
                            @foreach ($properties as $pr)
                            <tr>
                                <th>H. Event</th>
                                <td>{{ $pr->headline_ev }}</td> </tr>
                                <tr>
                                <th>T. Event</th>
                                <td>{{ $pr->text_ev }}</td></tr>
                                <tr>
                                <th>H. Message</th>
                                <td>{{ $pr->headline_mg }}</td></tr>
                                <tr>
                                <th>T. Message</th>
                                <td>{{ $pr->text_mg }}</td></tr>
                                <tr>
                                <th>Phone Number</th>
                                <td>{{ $pr->phone_number }}</td></tr>
                                <tr>
                                <th>IG</th>
                                <td>{{ $pr->instagram }}</td></tr>
                                <tr>
                                <th>FB</th>
                                <td>{{ $pr->facebook }}</td></tr>
                                <tr>
                                <th>TWT</th>
                                <td>{{ $pr->twitter }}</td>
                            </tr>
                            <tr>
                                <th>EM</th>
                                <td>{{ $pr->email }}</td></tr>
                                <tr>
                                <th>Action</th>
                                <td>
                                    <a href="{{ url('/dashboard/property/'.$pr->id.'/edit') }}" style="color: blue"><span class="icon"><i
                                            class='bx bx-edit'></i></span></a>
                                    <form action="{{ route('property.destroy', $pr->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            style="background: none; border: none; color:red; cursor: pointer;" onclick="return confirm('Are you sure you want to delete this data?')">
                                            <span class="icon"> <i class='bx bx-trash'></i></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
        <!-- MAIN -->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CONTENT -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
