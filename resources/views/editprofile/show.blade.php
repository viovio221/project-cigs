<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Profile</title>
</head>

<body>
    <div class="container">
        <div class="box">
            @if (auth()->user() && auth()->user()->document)
                <img src="{{ asset('storage/document_images/' . auth()->user()->document->image) }}">
            @endif
            <ul>
                @if (auth()->user()->barcode_path)
                <img src="{{ asset(auth()->user()->barcode_path) }}" alt="Barcode">
            @else
                <p>Anda belum memiliki barcode.</p>
            @endif

                <br>
                <br>
                <tr>
                    <th><i style="font-size:24px" class="fa"></i></th>
                    <th><i style="font-size:24px" class="fa"></i></th>
                    <th><i style="font-size:24px" class="fa"></i></th>
                </tr>
                <form action="{{ route('dashboard') }}">
                    <div class="mb-3 d-grid">
                        <button type="submit" class="button btn-secondary"><b>BACK</b></button>
                    </div>
                </form>
            </ul>
        </div>
        <div class="About">
            <ul>
                <section id="content">
                    <!-- NAVBAR -->
                    <nav>
                        <i class='bx bx-menu'></i>
                        <form action="#" class="search-form" hidden>
                            <div class="form-input">
                                <input type="search" placeholder="Search..." class="search-input">
                                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                            </div>
                        </form>
                        <a href="/dashboard/message" class="notification" title="message here">
                            <i class='bx bxs-edit-alt'></i>
                        </a>

                        @if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'member'))
                            <a href="/dashboard/review" class="notification" title="event's review here">
                                <i class='bx bxs-bell'></i>
                            </a>
                        @endif

                        <a href="{{ route('editprofile.show') }}" class="notification" title="edit profile here">
                            <i class='bx bxs-user-circle'></i> </a>
                    </nav>
                </section>
                <h1><b>ABOUT PROFILE</b></h1>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>Full Name </th>
                        <td>{{ auth()->user()->name }}</td>
                    </tr>
                </table>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>Status </th>
                        <td>{{ auth()->user()->role }}</td>
                    </tr>
                </table>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>Email </th>
                        <td>{{ auth()->user()->email }}</td>
                    </tr>
                </table>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>Phone Number </th>
                        <td>{{ auth()->user()->phone_number }}</td>
                    </tr>
                </table>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>Gender </th>
                        <td>{{ auth()->user()->gender }}</td>
                    </tr>
                </table>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>Date Birth </th>
                        <td>{{ auth()->user()->date_birth }}</td>
                    </tr>
                </table>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>Address </th>
                        <td>{{ auth()->user()->address }}</td>
                    </tr>
                </table>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>Province </th>
                        <td>{{ auth()->user()->province }}</td>
                    </tr>
                </table>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>City </th>
                        <td>{{ auth()->user()->city }}</td>
                    </tr>
                </table>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>District </th>
                        <td>{{ auth()->user()->district }}</td>
                    </tr>
                </table>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>Postal Code </th>
                        <td>{{ auth()->user()->postal_code }}</td>
                    </tr>
                </table>
            </ul>
            @if (auth()->user()->document)
                <ul>
                    <table>
                        <tr>
                            <th>Document Image </th>
                            <td><img src="{{ asset('storage/document_images/' . auth()->user()->document->image) }}"
                                    alt="Document Image" class="document_images"></td>
                        </tr>
                    </table>
                </ul>
                <ul>
                    <table>
                        <tr>
                            <th>Tipe </th>
                            <td>{{ auth()->user()->document->tipe }}</td>
                        </tr>
                    </table>
                </ul>
            @endif
            <form action="{{ route('editprofile.edit') }}">
                <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary"><b>Edit Profile</b></button>
                </div>
            </form>
        </div>
    </div>
    <!-- CONTENT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('sweetalert::alert')
</body>

</html>
