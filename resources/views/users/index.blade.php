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

    @if ($profiles->count() > 0)
    <title>Members Data | {{ $profiles[0]->community_name }}</title>
    @foreach ($profiles as $profile)
        <p>{{ $profile->community_name }}</p>
    @endforeach
@endif

</head>

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
                <a href="">
                    <i class='bx bx-data'></i>
                    <span class="text">CRUD Riders</span>
                </a>
            </li>
            <li class="side1">
                <a href="/dashboard/event_crud" class="text2">
                    <i class='bx bx-chevrons-right'></i> <span class="text">Events</span>
                </a>
            </li>
            <li class="side1 {{ Request::is('dashboard/message_crud*') ? 'active' : '' }}">
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
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <a href="/dashboard/message" class="notification">
                <i class='bx bxs-edit-alt'></i>
            </a>
            <input type="checkbox" id="switch-mode" hidden style="display: none;">
            <label for="switch-mode" class="switch-mode"></label>
            <a href="/dashboard/review" class="notification">
                <i class='bx bxs-bell'></i>
            </a>

            <a href="{{ route('editprofile.show') }}" class="notification" title="edit profile here">
                <i class='bx bxs-user-circle'></i>       </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main class="membersdata">
            <div class="head-title">
                <div class="left">
                    <h1>Data CRUD Riders</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="/dashboard/index">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="/">Landing Page</a>
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
                                </ul>Route::get('/dashboard/membersdata_crud', [UserController,
                                'index'])->name('dashboard.membersdata_crud');
                            </div>
                        @endif
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                              </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $us)
                            @if ($us->role === 'non-member')
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $us->name }}</td>
                                <td>{{ $us->email }}</td>
                                <td>{{ $us->role }}</td>
                                <td>{{ $us->created_at }}</td>
                                    <td>
                                        <a href="#" style="color: blue" class="edit-user" data-user-id="{{ $us->id }}"><i class='bx bx-edit'></i></a>
                                        <form action="{{ route('users.destroy', $us->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background: none; border: none; color:red" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class='bx bx-trash'></i></button>
                                        </form>
                                    </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
        <!-- MAIN -->
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-user');

            editButtons.forEach((button) => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const userId = button.getAttribute('data-user-id');

                    Swal.fire({
                        title: 'Konfirmasi Perubahan Status',
                        text: 'Apakah Anda ingin mengubah status pengguna ini menjadi member?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Tidak'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim permintaan ke server untuk mengubah status pengguna
                            fetch(`/dashboard/membersdata_crud/${userId}/confirm`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({ status: 'member' })
                            })
                            .then((response) => response.json())
                            .then((data) => {
                                if (data.success) {
                                    Swal.fire({
                                        title: 'Status Berhasil Diubah!',
                                        text: 'Status pengguna telah diubah menjadi member.',
                                        icon: 'success'
                                    });
                                    // Refresh halaman setelah menampilkan pesan sukses
                                    location.reload();
                                } else {
                                    Swal.fire({
                                        title: 'Gagal Mengubah Status!',
                                        text: 'Terjadi kesalahan saat mengubah status pengguna.',
                                        icon: 'error'
                                    });
                                }
                            })
                            .catch((error) => {
                                Swal.fire({
                                    title: 'Gagal Menghubungi Server!',
                                    text: 'Terjadi kesalahan saat menghubungi server.',
                                    icon: 'error'
                                });
                            });
                        }
                    });
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CONTENT -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
