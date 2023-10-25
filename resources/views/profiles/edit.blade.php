<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Description | Wayang Riders</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="{{ asset('css/edit_profilecrud.css') }}">

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
            <li class="side1">
                <a href="/dashboard/membersdata_crud" class="text2">
                    <i class='bx bx-chevrons-right'></i> <span class="text">Confirm User</span>
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

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Edit Setting</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="/dashboard/news">Back to Events</a>
                        </li>
                    </ul>
                </div>
            </div>

        </main>
        <!-- MAIN -->

        <div class="container mt-5">
           <center> <h1>Setting</h1></center>
            <form action="{{ route('profiles.update', ['profiles' => $profiles->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Add this line to indicate the PUT request -->
                <!-- Form fields and submit button -->
                <div class="mb-3">
                    <label for="name" class="form-label">History</label>
                    <input type="text" name="history" class="form-control  @error('history') is-invalid @enderror"
                        value="{{ $profiles->history }}" required>
                    @error('history')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Community</label>
                    <textarea class="form-control @error('community_bio') is-invalid @enderror" name="community_bio" rows="5">{{ $profiles->community_bio }}</textarea>
                    @error('community_bio')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Current Image</label>
                    <img src="{{ asset('/storage/' . $profiles->image) }}" alt="Profiles Image" width="100">
                </div>

                {{-- <div class="mb-3">
                    <label class="form-label">Current Image</label>
                    <img src="{{ asset('storage/event_images/' . $event->image) }}" alt="Events Image" width="100">
                </div> --}}
                <div class="form-group">
                    <label class="font-weight-bold">Community Structure</label>
                    <textarea class="form-control @error('community_structure') is-invalid @enderror" name="community_structure" rows="5">{{ $profiles->community_structure }}</textarea>
                    @error('community_structure')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Slogan</label>
                    <textarea class="form-control @error('slogan') is-invalid @enderror" name="slogan" rows="5">{{ $profiles->slogan }}</textarea>
                    @error('slogan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Community Name</label>
                    <textarea class="form-control @error('community_name') is-invalid @enderror" name="community_name" rows="5">{{ $profiles->community_name }}</textarea>
                    @error('community_name')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="video" class="form-label">Video</label>
                    <input type="file" name="video" class="form-control @error('video') is-invalid @enderror">
                    @error('video')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Current Video</label>
                    <video src="{{ '/storage/' . $profiles->video }}" alt="Profiles Video" width="100">
                </div>
                <div class="mb-3">
                    <label for="video" class="form-label">Video 1</label>
                    <input type="file" name="video" class="form-control @error('video') is-invalid @enderror">
                    @error('video')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Current Video</label>
                    <video src="{{ '/storage/' . $profiles->video1 }}" alt="Profiles Video" width="100">
                    </div>
                <div class="mb-3">
                    <label for="video" class="form-label">Video 2</label>
                    <input type="file" name="video" class="form-control @error('video') is-invalid @enderror">
                    @error('video')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Current Video</label>
                    <video src="{{ '/storage/' . $profiles->video2 }}" alt="Profiles Video" width="100">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Sender</label>
                        <textarea class="form-control @error('sender') is-invalid @enderror" name="sender" rows="5">{{ $profiles->sender }}</textarea>
                        @error('sender')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="font-weight-bold">End Point</label>
                        <textarea class="form-control @error('endpoint') is-invalid @enderror" name="endpoint" rows="5">{{ $profiles->endpoint }}</textarea>
                        @error('endpoint')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">API Key</label>
                        <textarea class="form-control @error('api_key') is-invalid @enderror" name="api_key" rows="5">{{ $profiles->api_key }}</textarea>
                        @error('api_key')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">API Token</label>
                        <textarea class="form-control @error('api_token') is-invalid @enderror" name="api_token" rows="5">{{ $profiles->api_token }}</textarea>
                        @error('api_token')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
                            <!-- ... -->


                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const registerButtons = document.querySelectorAll('.btn.btn-primary');

                                            const eventId = registerButton.getAttribute('data-event-id');
                                            const eventName = registerButton.getAttribute('data-event-name');
                                            const eventDate = registerButton.getAttribute('data-event-date');

                                            }).then((response) => {
                                                if (response.data.message === 'You are already registered for this event.') {
                                                    Swal.fire('You are already registered for this event.',
                                                        'You cannot register again for the same event.', 'info');
                                                } else if (response.data.message === 'Registration successful') {
                                                    Swal.fire('Thank you!',
                                                        'You have registered for this event.', 'success');
                                                } else {
                                                    Swal.fire('Error',
                                                        'An error occurred while registering for the event.',
                                                        'error');
                                                }
                                            }).catch((error) => {
                                                Swal.fire('Error',
                                                    'An error occurred while registering for the event.',
                                                    'error');
                                            });
                                </script>




                            <!-- ... -->


                        </div>

                    </div>

                </div>

            </div>

        </section>
        <!-- Ionicon link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script>
            AOS.init({
                duration: 800,
                delay: 400
            });
        </script>

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
                     window.location.href = #${firstMatchId};
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
        <!-- CONTENT -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        @include('sweetalert::alert')
</body>

</html>
