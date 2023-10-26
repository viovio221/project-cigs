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

    @foreach ($profile as $item)
        <title>Members Data | {{ $item->community_name }}</title>
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
            <form action="#" hidden>
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <a href="/dashboard/message" class="notification">
                <i class='bx bxs-edit-alt'></i>
            </a>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode" title="switch mode"></label>


            @if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'member'))
                <a href="/dashboard/review" class="notification" id="notificationLink">
                    <i class='bx bx-calendar-star'></i>
                </a>
            @endif

            <a href="{{ route('editprofile.show') }}" class="notification" title="edit profile here">
                <i class='bx bxs-user-circle'></i>
            </a>

        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main class="membersdata">
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
            @foreach ($users as $usr)
                <tr>
                    <ul class="box-info" style="align-content: center">
                        <li>
                            <i class='bx bxs-group'></i>
                            <span class="text">
                                <h3 style="font-size: 15px">{{ $usr->name }}</h3>
                            </span>
                            <form action="/dashboard/membersdata" method="POST" id="roleForm">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $usr->id }}">
                                @if (Auth::check() && Auth::user()->role === 'admin')
                                    <select name="role" onchange="confirmRoleChange(this)">
                                        <option value="admin" @if ($usr->role == 'admin') selected @endif>Admin
                                        </option>
                                        @if ($usr->id === Auth::user()->id && $usr->role === 'member')
                                            <option value="member" selected>Member</option>
                                        @else
                                            <option value="member" @if ($usr->role == 'member') selected @endif>
                                                Member</option>
                                        @endif
                                        @if ($usr->id === Auth::user()->id && $usr->role === 'organizer')
                                            <option value="organizer" selected>Organizer</option>
                                        @else
                                            <option value="organizer"
                                                @if ($usr->role == 'organizer') selected @endif>Organizer</option>
                                        @endif
                                        @if ($usr->id === Auth::user()->id && $usr->role === 'non-member')
                                            <option value="non-member" selected>Non-Member</option>
                                        @else
                                            <option value="non-member"
                                                @if ($usr->role == 'non-member') selected @endif>Non-Member</option>
                                        @endif
                                    </select>
                                @endif
                            </form>
                            @if ($usr->id === Auth::user()->id && $usr->role === 'member')
                                <form action="/dashboard/membersdata" method="POST" id="adminForm">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $usr->id }}">
                                    <button type="submit" name="role" value="admin">Change to Admin</button>
                                </form>
                            @endif
                            @if ($usr->id === Auth::user()->id && $usr->role === 'organizer')
                                <form action="/dashboard/membersdata" method="POST" id="adminForm">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $usr->id }}">
                                    <button type="submit" name="role" value="admin">Change to Admin</button>
                                </form>
                            @endif
                        </li>
                        <li>
                            <i class='bx bxs-group'></i>
                            <span class="text">
                                <h3 style="font-size: 15px">{{ $usr->email }}</h3>
                            </span>
                        </li>
                    </ul>

                </tr>

                </li>
                </ul>
                </td>
                </tr>
            @endforeach
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function confirmRoleChange(selectElement) {
                    Swal.fire({
                        title: 'Confirm Role Change',
                        text: 'Do you want to change this user\'s role?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            selectElement.form.submit();
                        } else {
                            // Reset the selection if the user cancels
                            const selectedRole = "{{ $usr->role }}";
                            for (let option of selectElement.options) {
                                if (option.value === selectedRole) {
                                    option.selected = true;
                                    break;
                                }
                            }
                        }
                    });
                }
                document.addEventListener('DOMContentLoaded', function() {
                    const roleForm = document.getElementById('roleForm');
                    roleForm.addEventListener('submit', function(event) {
                        // Prevent the form from being submitted normally
                        event.preventDefault();
                        // Simulate a successful role change
                        Swal.fire({
                            title: 'Status Successfully Changed!',
                            text: 'The user\'s role has been changed successfully.',
                            icon: 'success'
                        }).then(() => {
                            // Redirect to dashboard.index after the success message is acknowledged
                            window.location.href = "/dashboard/index";
                        });
                    });
                });
            </script>

            <script src="{{ asset('js/dashboard.js') }}"></script>
            <script>
                // Simulasi informasi pengguna yang masuk
                const loggedInUser = {
                    id: 123, // Ganti dengan ID pengguna yang masuk
                };

                // Fungsi untuk mendapatkan jumlah komentar post dari server
                function getCommentCount(userId) {
                    // Anda perlu mengganti URL dengan endpoint yang sesuai di sisi server Anda
                    fetch(`/getCommentCount?userId=${userId}`)
                        .then(response => response.json())
                        .then(data => {
                            updateNotificationCount(data.commentCount);
                        })
                        .catch(error => console.error('Error:', error));
                }

                function updateNotificationCount(count) {
                    const notificationCountElement = document.getElementById('notificationCount');
                    notificationCountElement.innerText = count;
                    notificationCountElement.style.display = 'block';
                }

                // Panggil fungsi untuk mendapatkan jumlah komentar saat halaman dimuat
                getCommentCount(loggedInUser.id);
            </script>



</body>

</html>
