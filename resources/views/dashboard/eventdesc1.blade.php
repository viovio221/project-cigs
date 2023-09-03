<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
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
                        <img src="{{ asset('images/event1.png') }}" alt="blog banner">
                    </div>
                </div>

                <div class="blog-content">

                    <h3 class="blog-title">
                        <a href="#">CRUISER CONVOY: MELINTASI KOTA DALAM GAYANYA SENDIRI</a>
                    </h3>
                    <div class="blog-text">
                        <p>"CRUISER CONVOY: MELINTASI KOTA DALAM GAYANYA SENDIRI" adalah perayaan khusus bagi para
                            penggemar motor cruiser yang ingin merayakan gaya hidup berkendara mereka dengan cara yang
                            istimewa. Acara ini adalah wadah bagi komunitas motor cruiser untuk berkumpul, berbagi
                            pengalaman, dan menjalin persahabatan dalam lingkungan yang hangat dan mendukung. Pastikan
                            untuk mematuhi aturan lalu lintas dan peraturan keselamatan selama konvoi motor. Acara ini
                            ditujukan untuk bersenang-senang dan merayakan gaya berkendara cruiser tanpa melanggar hukum
                            atau membahayakan diri sendiri dan orang lain di jalan.</p>
                    </div>
                    <div class="wrapper">

                        <div class="blog-publish-date">
                            <i class='bx bx-calendar'></i>
                            <a href="#">05 November, 2022</a>
                        </div>

                        <button class="btn btn-primary">
                            <p class="btn-text"><a href="#" style="color: white ;">Daftar Acara</a></p>
                            <span class="square"></span>
                        </button>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const registerButton = document.querySelector('.btn.btn-primary');

                                registerButton.addEventListener('click', function() {
                                    Swal.fire({
                                        title: 'Are you interested to joining this event?',
                                        showCancelButton: true,
                                        confirmButtonColor: '#ffa500',
                                        cancelButtonColor: '#DB504A',
                                        confirmButtonText: 'Register',
                                        cancelButtonText: 'Cancel',
                                        icon: 'question',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            //
                                            Swal.fire('Thank you!', 'You have registered for this event.', 'success');
                                        }
                                    });
                                });
                            });
                        </script>


                        <div class="blog-comment">
                            <i class='bx bx-comment-dots'></i>
                            <a href="#">3 Review</a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- Custom JS link -->
    <script src="{{ asset('js/eventdesc.js') }}"></script>
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
    @include('sweetalert::alert')
</body>

</html>
