<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        @foreach ($profiles as $item)
        <title>Add Events | {{ $item->community_name }}</title>
        @endforeach    <link rel="stylesheet" href="{{ asset('css/edit_news.css') }}">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


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



<body>

    <div class="container mt-5">
        <h1>Tambah Event</h1>
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="users_id" class="form-label">User ID:</label>
                <input type="number" name="users_id" class="form-control" required>
            </div> --}}
            <div class="mb-3">
                <label for="date" class="form-label">Tanggal:</label>
                <input type="date" name="date" class="form-control  @error('date') is-invalid @enderror" required>
                @error('date')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Lokasi:</label>
                <input type="text" name="location" class="form-control  @error('location') is-invalid @enderror" required>

                @error('location')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
            </div>
<div class="form-group">
    <label class="font-weight-bold" >Deskripsi</label>
    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{ old('description') }}</textarea>

    <!-- error message untuk description -->
    @error('description')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="image" class="form-label">Gambar:</label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
    @error('image')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
