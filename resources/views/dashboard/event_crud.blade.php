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
    <title>Event CRUD | {{ $item->community_name }}</title>
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
                <a href="">
                    <i class='bx bx-data'></i>
                    <span class="text">CRUD Riders</span>
                </a>
            </li>
            <li class="side1 {{ Request::is('dashboard/event_crud*') ? 'active' : '' }}">
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
            <form id="searchForm">
                <div class="form-input">
                    <input type="search" id="searchBox" placeholder="Search...">
                    <button type="submit" id="searchSubmit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <a href="/dashboard/message" class="notification">
                <i class='bx bxs-edit-alt'></i>
            </a>
            <input type="checkbox" id="switch-mode" hidden style="display: none;">
            <label for="switch-mode" class="switch-mode"></label>
            <a href="/dashboard/review" class="notification">
                <i class='bx bx-calendar-star'></i>
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
                        <form action="{{ route('events.create') }}">
                                <center><button type="submit" class="btn1 btn-primary"><b>Add Event</b></button></center>
                        </form>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <i class=''></i>
                        <i class=''></i>
                    </div>
                    <br>
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
                                        <td class="event searchable-element">{{ $event->name }}</td>
                                        <td class="searchable-element">{{ $event->date }}</td>
                                        <td class="location searchable-element">{{ $event->location }}</td>
                                        <td class="description-event searchable-element">{!! $event->description !!}</td>
                                        <td class="side-menu top">

                                            <a href="{{ route('events.show', $event->id) }}" style="color: green"><span class="icon"><i
                                                    class='bx bx-info-circle'></i></span></a>
                                            <a href="{{ route('events.edit', ['event' => $event->id]) }}"
                                                method="post" style="color: blue"><span class="icon"><i class='bx bx-edit'></i></span></a>
                                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background: none; border: none; color: red; cursor: pointer;" onclick="return confirm('Are you sure you want to delete this data?')">
                                                        <span class="icon">  <i class='bx bx-trash'></i></span>
                                                    </button>
                                                </form>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            </tbody>
            </table>
            </div>
            </div>

        </main>
        <!-- MAIN -->
    </section>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const searchBox = document.getElementById('searchBox');
     const searchSubmit = document.getElementById('searchSubmit');
     let alertShown = false;

     searchSubmit.addEventListener('click', (e) => {
         e.preventDefault();
         const searchTerm = searchBox.value.toLowerCase();

         if (searchTerm === '') {
             return;
         }

         removeHighlights();

         const textElements = document.querySelectorAll('.searchable-element');

         let found = false;
         let firstMatchId = null;

         textElements.forEach((element) => {
             const text = element.innerText.toLowerCase();
             const regex = new RegExp(searchTerm, 'gi');

             if (regex.test(text)) {
                 found = true;
                 const highlightedText = element.innerHTML.replace(
                     regex,
                     '<span class="highlight">$&</span>'
                 );
                 element.innerHTML = highlightedText;

                 if (!firstMatchId) {
                     firstMatchId = element.getAttribute('id');
                 }
             }
         });

         if (found) {
             if (firstMatchId) {
                 window.location.href = `#${firstMatchId}`;
             }
         } else {
             if (!alertShown) {
                 Swal.fire('Sorry!', 'No results for this search!', 'info');
                 alertShown = true;
             } else {
                 alertShown = false;
             }
         }
     });

     function removeHighlights() {
         const highlightedElements = document.querySelectorAll('.highlight');
         highlightedElements.forEach((element) => {
             element.outerHTML = element.innerHTML;
         });
     }

     </script>
    <!-- CONTENT -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
