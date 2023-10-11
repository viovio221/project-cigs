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
                @if (Auth::user()->role === 'organizer' ||
                        Auth::user()->role === 'admin' ||
                        Auth::user()->role === 'member' ||
                        Auth::user()->role === 'non-member')
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
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <main class="membersdata">
            <div class="head-title">
                <div class="left">
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <h1>Admin Dashboard</h1>
                    @endif
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
            @if (Auth::check() && Auth::user()->role === 'organizer')
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>New Event's Data</h3>
                        </div>
                        <div class="table-data">
                            <div class="select-event">
                                <label for="eventDropdown">Select an Event:</label>
                                <select name="event_id" class="input-o" id="eventDropdown">
                                    <option value="">Pilih</option>
                                    @foreach ($event as $ev)
                                        <option {{ old('event_id') == $ev->id ? 'selected' : '' }}
                                                value="{{ $ev->id }}">
                                            {{ $ev->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <table id="eventTable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Members Name</th>
                                        <th>Event Date</th>
                                        <th>Event Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="eventTableBody">
                                    @if (isset($eventData))
                                        @foreach ($eventData as $data)
                                            <tr>
                                                <th></th>
                                                <td>{{ $data->user->name }}</td>
                                                <td>{{ $data->event_date }}</td>
                                                <td>{{ $data->event_name }}</td>
                                                <td><span class="status pending">{{ $data->status }}</span></td>
                                                <td class="side-menu top">
                                                    <form action="{{ route('event.destroy', $data->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                style="background: none; border: none; color:red"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
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
                </div>
            @endif
            <button class="btn btn-primary" data-event-id="{{ $event->first()->id }}"
                data-event-name="{{ $event->first()->name }}" data-event-date="{{ $event->first()->date }}">
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
                        <form action="{{ route('store') }}" method="POST" id="form">
                            @csrf
                            <input type="hidden" name="user_id" id="user_id">
                            <input type="hidden" name="event_name" id="event_name">
                            <input type="hidden" name="event_date" id="event_date">
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
                        var eventName = document.querySelector('.btn.btn-primary').getAttribute('data-event-name');
                        var eventDate = document.querySelector('.btn.btn-primary').getAttribute('data-event-date');
                        document.getElementById('user_id').value = parseInt(c); // Mengonversi 'c' menjadi integer
                        document.getElementById('event_name').value = eventName;
                        document.getElementById('event_date').value = eventDate;
                        document.getElementById('form').submit();
                    })
                </script>
                </main>
        </section>
        <!-- MAIN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#eventDropdown').change(function() {
            var selectedEventId = $(this).val();

            if (selectedEventId) {
                $.ajax({
                    url: '/dashboard/qrcode/getEvent/' + selectedEventId,
                    method: 'GET',
                    success: function(data) {
                        $('#eventTable').html(data);
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengambil data event.');
                    }
                });
            }
        });
    });
</script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @include('sweetalert::alert')
</body>
</html>
