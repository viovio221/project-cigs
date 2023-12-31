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
                            <a href="#">Dashboard </a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="/dashboard/qrcode/event_register">Event Register Scan</a>
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
                        <div class="select-event">
                            <label for="eventDropdown">Select an Event:</label>
                            <select name="event_id" class="input-o" id="eventDropdown" onchange="dropdownChange()">
                                <option value="">Pilih</option>
                                @foreach ($event as $ev)
                                    <option {{ request('event') == $ev->id ? 'selected' : '' }}
                                        value="{{ $ev->id }}" data-id="{{ $ev->id }}">
                                        {{ $ev->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div><br>
                        <center><button class="btn1 btn-primary" id="showEventDataButton">Lihat Data Event</button></center>
                        <div id="eventDataContainer" style="display: none;">
                            <table id="eventTable">
                                <thead>
                                    <tr>
                                        <th>Members Name</th>
                                        <th>Event Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="eventTableBody">
                                    @if (isset($eventData))
                                        @foreach ($eventData as $data)
                                            <tr>
                                                <td>{{ $data->user->name }}</td>
                                                <td>{{ ucwords($data->event->name) }}</td>
                                                <td><span class="status pending">{{ $data->status }}</span></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table-data2">
                        <table>
                            <tr>
                                <th>
                                    <center><h1>Scan Here</h1></center>
                                    <center><video id="preview" playsinline style="width: 100%; max-width: 450px;"></video></center>
                                </th>
                            </tr>
                        </table>
                </div>
                </div>
            @endif
            <div class="scan-container">

                <button class="btn btn-primary" data-event-id="{{ $event->first()->id }}">
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
                            <form action="{{ route('storeForEventRegister') }}" method="POST" id="form">
                                @csrf
                                <input type="hidden" name="user_id" id="user_id">
                                <input type="hidden" name="event_id" id="event_id">
                            </form>
                        </div>
                    </div>
                </button>
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
                    var selectedEventId = document.getElementById('eventDropdown').value;
                    document.getElementById('user_id').value = parseInt(c);
                    document.getElementById('event_id').value = selectedEventId;
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
        document.getElementById('showEventDataButton').addEventListener('click', function() {
            const eventDataContainer = document.getElementById('eventDataContainer');
            if (eventDataContainer.style.display === 'none') {
                eventDataContainer.style.display = 'block';
            } else {
                eventDataContainer.style.display = 'none';
            }
        });
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


    </script>
    <script>
        var nameEventOption = document.getElementById('eventDropdown');
        document.addEventListener('DOMContentLoaded', function() {
            nameEventOption.addEventListener('change', function() {
                var selectedNameEvent = nameEventOption.options[nameEventOption.selectedIndex];
                var dataIdValue = selectedNameEvent.value;


                var idDataInput = document.getElementById('event_id');
                idDataInput.value = dataIdValue;


                localStorage.setItem('eventId', dataIdValue);
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
