<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/qr.css') }}">
    @foreach ($profile as $item)
        <title>Dashboard | {{ $item->community_name }}</title>
    @endforeach
</head>

<body>

    <section id="content">
        <main class="membersdata">
            <div class="head-title">
                <div class="left">
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <h1>Admin Dashboard</h1>
                    @endif
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Presence Scan </a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="/dashboard">Back to dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>

            <button class="btn btn-primary" data-event-id="{{ $event->id }}">
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
                        <form action="{{ route('store.presence') }}" method="POST" id="form">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="status" id="status" value="checkin">
                            <input type="hidden" name="event_data_id" id="event_data_id">
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
                        var eventDataId = document.querySelector('.btn.btn-primary').getAttribute(
                            'data-event-id'); // Ambil 'event_data_id' dari tombol

                        document.getElementById('id').value = parseInt(c);
                        document.getElementById('event_data_id').value = eventDataId; // Set 'event_data_id' dalam elemen input
                        document.getElementById('form').submit();
                    });
                </script>
        </main>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#eventDropdown').change(function() {
                var selectedEventId = $(this).val();
                console.log(selectedEventId);

                window.location.href = ('?event=' + selectedEventId)
            });
        });
    </script>

   
    <script>
        $(document).ready(function() {
            var selectedEventId = null;

            $('#eventDropdown').change(function() {
                selectedEventId = $(this).val();
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
