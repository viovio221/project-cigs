<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event's Review</title>
    <!-- Boxicons -->
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
                        <a href="">
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
                        <input type="text" name="username" class="input" value="{{ auth()->user()->name }}" readonly />
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>

                    <div class="input-container">
                        <label for="event_id">Event Name</label>
                        <select name="event_id" class="input">
                            <option value="">Pilih</option>
                            @if (isset($event))

                            @foreach ($event as $ev)
                                <option {{ old('event_id') == $ev->id ? 'selected' : '' }} value="{{ $ev->id }}">{{ $ev->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="content">Content</label>
                        <textarea name="content" class="input"></textarea>
                    </div>

                    <div class="input-container textarea">
                        <textarea name="description" class="input"></textarea>
                        <label for="">Description</label>
                        <span>Description</span>
                    </div>
                    <input type="submit" value="Submit" class="btn" />
                </form>
            </div>
        </div>
    </div>
    <script>
        const inputs = document.querySelectorAll(".input");

        function focusFunc() {
            let parent = this.parentNode;
            parent.classList.add("focus");
        }

        function blurFunc() {
            let parent = this.parentNode;
            if (this.value == "") {
                parent.classList.remove("focus");
            }
        }

        inputs.forEach((input) => {
            input.addEventListener("focus", focusFunc);
            input.addEventListener("blur", blurFunc);
        });
    </script>
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

</body>

</html>