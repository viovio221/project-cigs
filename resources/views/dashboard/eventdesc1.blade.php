<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Description</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="{{ asset('css/eventdesc.css') }}">
    <!-- Google Font link -->
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700;800;900&family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>

    <section class="blog" id="blog" data-aos="fade-up">

        <p class="section-subtitle">Selamat Datang di Event Wayang Riders</p>

        <h2 class="section-title">Bergabung Dengan Kami Untuk Events Yang Akan Datang</h2>

        <div class="blog-grid">

            <div class="blog-card" data-aos="zoom">

                <div class="center-image">
                    <div class="blog-banner-box">
                        @foreach ($events as $item)
                            <img src="{{ asset('storage/event_images/' . $item->image) }}" alt="Events Image"
                                width="100">
                        @endforeach
                    </div>
                </div>

                <div class="blog-content">

                    <h3 class="blog-title">
                        <a href="#">
                            @foreach ($events as $item)
                                {!! $item->name !!}
                            @endforeach
                        </a>
                    </h3>
                    <div class="blog-text">
                        @foreach ($events as $item)
                            {!! $item->description !!}
                        @endforeach

                        <p>Lokasi : @foreach ($events as $item)
                                {!! $item->location !!}
                            @endforeach
                        </p>
                    </div>
                    <div class="wrapper">

                        <div class="blog-publish-date">
                            <i class='bx bx-calendar'></i>
                            <a href="#">
                                @foreach ($events as $item)
                                    {!! $item->date !!}
                                @endforeach
                            </a>
                        </div>

                        <!-- ... -->
                        @foreach ($events as $event)
                            <button class="btn btn-primary" data-event-id="{{ $event->id }}"
                                data-event-name="{{ $event->name }}" data-event-date="{{ $event->date }}">
                                <p class="btn-text"><a href="#" style="color: white;">Daftar Acara</a></p>
                                <span class="square"></span>
                            </button>
                        @endforeach



                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const registerButtons = document.querySelectorAll('.btn.btn-primary');

                                registerButtons.forEach(registerButton => {
                                        registerButton.addEventListener('click', function() {
                                                @auth
                                                const userId = '{{ auth()->user()->id }}';
                                            @else
                                                const userId = null;
                                            @endauth

                                            const eventId = registerButton.getAttribute('data-event-id');
                                            const eventName = registerButton.getAttribute('data-event-name');
                                            const eventDate = registerButton.getAttribute('data-event-date');

                                            Swal.fire({
                                                title: 'Are you interested in joining this event?',
                                                showCancelButton: true,
                                                confirmButtonColor: '#ffa500',
                                                cancelButtonColor: '#DB504A',
                                                confirmButtonText: 'Register',
                                                cancelButtonText: 'Cancel',
                                                icon: 'question',
                                                html: `
                                    <p>Nama Pengguna: <strong>{{ auth()->user()->name }}</strong></p>
                                    <p>Judul Acara: <strong>${eventName}</strong></p>
                                    <p>Tanggal Acara: <strong>${eventDate}</strong></p>
                                `
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    axios.post('{{ route('event.register') }}', {
                                                        user_id: userId,
                                                        event_id: eventId,
                                                        eventName: eventName,
                                                        eventDate: eventDate,
                                                    }).then((response) => {
                                                        Swal.fire('Thank you!',
                                                            'You have registered for this event.', 'success');
                                                    }).catch((error) => {
                                                        Swal.fire('Error',
                                                            'An error occurred while registering for the event.',
                                                            'error');
                                                    });
                                                }
                                            });
                                        });
                                });
                            });
                        </script>



                        <!-- ... -->

                        <div class="blog-comment">
                            <i class='bx bx-comment-dots'></i>
                            <a href="#">3 Review</a>
                        </div>

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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @include('sweetalert::alert')
</body>

</html>
