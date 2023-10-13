<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/presence.css') }}">
    @foreach ($profile as $item)
        <title>Dashboard | {{ $item->community_name }}</title>
    @endforeach
</head>

<body>

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
                                        <option {{ request('event') == $ev->id ? 'selected' : '' }}
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
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </ul>
            @endif
            <button class="btn btn-primary" data-event-id="{{ $event->first()->id }}"
                data-event-name="{{ $event->first()->name }}" data-event-date="{{ $event->first()->date }}">
                <div class="container col-lg-3 py-3">
                    <div class="card bg-white shadow rounded-3 p-3 broder-0">
                        @if (session()->has('failed'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong> {{ session()->get('failed') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
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

                        // Simpan kode pengiriman data atau tindakan yang Anda perlukan di sini, jika diperlukan.

                        // Tampilkan SweetAlert tanpa mengirimkan permintaan POST.
                        Swal.fire('Registration successful', 'You have registered for this event.', 'success');
                    })
                </script>
        </main>
    </section>
    <!-- MAIN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
            $('#eventDropdown').change(function() {
                var selectedEventId = $(this).val();

                window.location.href = ('?event=' + selectedEventId)
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
