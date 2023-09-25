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

    <title>Data CRUD</title>
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
            <li class="active">
                <a href="">
                    <i class='bx bx-data'></i>
                    <span class="text">CRUD Riders</span>
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
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="/dashboard/review" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="{{ route('editprofile.show') }}" class="profile">
                <img src="{{ asset('images/devani.jpg') }}">
            </a>

        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
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
            {{-- <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3><a href="{{ route('events.create') }}" class="btn btn-outline-primary">Add Event</a></h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name Event</th>
                                <th>Date Event</th>
                                <th>Location</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($events))
                                @foreach ($events as $event)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ asset('storage/event_images/' . $event->image) }}"
                                                alt="Event" width="100">
                                        </td>
                                        <td class="event">{{ $event->name }}</td>
                                        <td>{{ $event->date }}</td>
                                        <td  class="location">{{ $event->location }}</td>
                                        <td class="description-event">{!! $event->description !!}</td>
                                        <td class="side-menu top">
                                            <a href="{{ route('events.show', $event->id) }}" style="color: green"><i
                                                    class='bx bx-info-circle'></i></a>
                                            <a href="{{ route('events.edit', ['event' => $event->id]) }}"
                                                method="post" style="color: blue"><i class='bx bx-edit'></i></a>
                                            <form action="{{ route('events.destroy', $event->id) }}" method="POST"
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
            </div> --}}

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3><a href="#" class="btn btn-outline-primary">Add
                                Message</a></h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">User</th>
                                <th scope="col">Message</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($messages))
                                @foreach ($messages as $mg)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $mg->user->name }}</td>
                                        <td class="message">{{ $mg->message }}</td>
                                        <td>{{ $mg->created_at }}</td>
                                        <td class="side-menu top">
                                            <a href="{{ route('message.show', $mg->id) }}" style="color: green"><i
                                                    class='bx bx-info-circle'></i></a>
                                            <a href="{{ route('message.edit', ['message' => $mg->id]) }}"
                                                method="post" style="color: blue"><i class='bx bx-edit'></i></a>
                                            <form action="{{ route('message.destroy', $mg->id) }}" method="POST"
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



            {{-- crud news atau berita terbaru --}}
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3><a href="{{ route('news.create') }}" class="btn btn-outline-primary">Add News</a>
                        </h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($news))
                                @foreach ($news as $nw)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ asset('storage/new_images/' . $nw->image) }}" alt="news"
                                                width="100">
                                        </td>
                                        <td  class="event">{{ $nw->title }}</td>
                                        <td class="description">{!! $nw->description !!}</td>
                                        <td>{{ $nw->created_at }}</td>
                                        <td class="side-menu top">
                                            <a href="{{ route('news.show', $nw->id) }}" style="color: green"><i
                                                    class='bx bx-info-circle'></i></a>
                                            <a href="{{ route('news.edit', ['news' => $nw->id]) }}"
                                                style="color:blue"><i class='bx bx-edit'></i></a>
                                            <form action="{{ route('news.destroy', $nw->id) }}" method="POST"
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

           

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3><a href="{{ route('property.create') }}" class="btn btn-outline-primary">Add Property</a>
                        </h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>H. Event</th>
                                <th>T. Event</th>
                                <th>H. Message</th>
                                <th>T. Message</th>
                                <th>Phone Number</th>
                                <th>IG</th>
                                <th>FB</th>
                                <th>TWT</th>
                                <th>EM</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($properties))
                                @foreach ($properties as $pr)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pr->headline_ev }}</td>
                                    <td>{{ $pr->text_ev }}</td>
                                    <td>{{ $pr->headline_mg }}</td>
                                    <td>{{ $pr->text_mg }}</td>
                                    <td>{{ $pr->phone_number }}</td>
                                    <td>{{ $pr->instagram }}</td>
                                    <td>{{ $pr->facebook }}</td>
                                    <td>{{ $pr->twitter }}</td>
                                    <td>{{ $pr->email }}</td>
                                    <td>
                                        <a href="{{ route('property.edit', $pr->id) }} " style="color: blue"><i
                                                class='bx bx-edit'></i></a>
                                        <form action="{{ route('property.destroy', $pr->id) }}" method="POST"
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CONTENT -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
