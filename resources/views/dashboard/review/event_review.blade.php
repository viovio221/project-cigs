<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @foreach ($profiles as $item)
    <title>Event's Review | {{ $item->community_name }}</title>
    @endforeach       <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/event_review.css') }}" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <span class="big-circle"></span>
        <img src="img/shape.png" class="square" alt="" />
        <div class="form">
            <div class="contact-info">
                <h3 class="title">Welcome to Wayang Riders Event's Review</h3>
                <p class="text">
                    After participating in the event, we'll guide you to the review page. Here, you can share your
                    experience and provide feedback about the event you've attended. Thank you for your participation in
                    our motorcycle community!
                </p>

                <div class="social-media">
                    <p>Connect with us:</p>
                    <div class="social-icons">
                        <a href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="/dashboard/event">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>
                <form action="{{ route('comment_posts.store') }}" method="post">
                    @csrf
                    @method('post')
                    <h3 class="title">How Was Your Event Experience?</h3>
                    <div class="input-container">
                        <div class="rating">
                            <input type="number" name="rating" hidden>
                            <i class='bx bx-star star' style="--i: 0;" data-rating="1"></i>
                            <i class='bx bx-star star' style="--i: 1;" data-rating="2"></i>
                            <i class='bx bx-star star' style="--i: 2;" data-rating="3"></i>
                            <i class='bx bx-star star' style="--i: 3;" data-rating="4"></i>
                            <i class='bx bx-star star' style="--i: 4;" data-rating="5"></i>
                        </div>
                    </div>
                    <div class="input-container">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="input" value="{{ auth()->user()->name }}"
                            readonly />
                    </div>

                    <div class="input-container">
                        <span>Event Name</span>
                        <label for="event_id">Event Name</label>
                        <select name="event_id" class="input-o">
                            <option value="">Pilih</option>
                            @foreach ($events as $ev)
                                <option {{ old('event_id') == $ev->id ? 'selected' : '' }} value="{{ $ev->id }}">
                                    {{ $ev->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-container">
                        <span>Content</span>
                        <label for="content">Content</label>
                        <textarea name="content" class="input"></textarea>
                    </div>
                    <input type="submit" value="Submit" class="btn" />
                </form>
            </div>
        </div>
    </div>

    <script>
        const allStar = document.querySelectorAll('.rating .star')
        const ratingValue = document.querySelector('.rating input')

        allStar.forEach((item) => {
            item.addEventListener('click', function() {
                const rating = item.getAttribute('data-rating');
                ratingValue.value = rating;

                allStar.forEach((i) => {
                    const index = parseInt(i.getAttribute('data-rating'));
                    if (index <= rating) {
                        i.classList.replace('bx-star', 'bxs-star');
                    } else {
                        i.classList.replace('bxs-star', 'bx-star');
                    }
                });
            });
        });
    </script>
    <!-- CONTENT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/dashboard.js') }}"></script>
    @include('sweetalert::alert')
</body>


</html>
