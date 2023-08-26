<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/comment_post.css') }}">
    <title>Feedback Rating Form</title>
</head>

<body>

    <section class="swiper mySwiper">
        <div class="swiper-wrapper">

            <div class="card swiper-slide">
                <div class="card_image">
                    <img src="{{ asset('images/devani.jpg') }}" alt="">
                </div>
                <div class="card_content">
                    <span class="card_title">web developer</span>
                    <span class="card_name">Devani Amelia</span>
                    <form id="feedbackForm" class="feedback-form">
                        <textarea id="feedbackText" class="feedback-text" placeholder="Leave your feedback"></textarea>
                        <div class="rating">
                            <span class="rating-text">Rate: </span>
                            <a href="#" class="star-icon"><i class="fas fa-star"></i></a>
                            <a href="#" class="star-icon"><i class="fas fa-star"></i></a>
                            <a href="#" class="star-icon"><i class="fas fa-star"></i></a>
                            <a href="#" class="star-icon"><i class="fas fa-star"></i></a>
                            <a href="#" class="star-icon"><i class="fas fa-star"></i></a>
                        </div>
                        <button id="submitBtn" class="card_btn">Submit</button>
                    </form>
                </div>
            </div>

            <div class="card swiper-slide">
                <div class="card_image">
                    <img src="{{ asset('images/devani.jpg') }}" alt="">
                </div>
                <div class="card_content">
                    <span class="card_title">web developer</span>
                    <span class="card_name">Devani Amelia</span>
                    <form id="feedbackForm" class="feedback-form">
                        <textarea id="feedbackText" class="feedback-text" placeholder="Leave your feedback"></textarea>
                        <div class="rating">
                            <span class="rating-text">Rate: </span>
                            <input type="radio" name="rating" value="1" class="rating-input" />
                            <input type="radio" name="rating" value="2" class="rating-input" />
                            <input type="radio" name="rating" value="3" class="rating-input" />
                            <input type="radio" name="rating" value="4" class="rating-input" />
                            <input type="radio" name="rating" value="5" class="rating-input" />
                        </div>
                        <button id="submitBtn" class="card_btn">Submit</button>
                    </form>
                </div>
            </div>
            <div class="card swiper-slide">
                <div class="card_image">
                    <img src="{{ asset('images/devani.jpg') }}" alt="">
                </div>
                <div class="card_content">
                    <span class="card_title">web developer</span>
                    <span class="card_name">Devani Amelia</span>
                    <form id="feedbackForm" class="feedback-form">
                        <textarea id="feedbackText" class="feedback-text" placeholder="Leave your feedback"></textarea>
                        <div class="rating">
                            <span class="rating-text">Rate: </span>
                            <input type="radio" name="rating" value="1" class="rating-input" />
                            <input type="radio" name="rating" value="2" class="rating-input" />
                            <input type="radio" name="rating" value="3" class="rating-input" />
                            <input type="radio" name="rating" value="4" class="rating-input" />
                            <input type="radio" name="rating" value="5" class="rating-input" />
                        </div>
                        <button id="submitBtn" class="card_btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 300,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });

        document.addEventListener("DOMContentLoaded", function () {
            const feedbackForm = document.getElementById("feedbackForm");
            const feedbackText = document.getElementById("feedbackText");
            const ratingInputs = document.querySelectorAll(".rating-input");
            const submitBtn = document.getElementById("submitBtn");

            submitBtn.addEventListener("click", function (event) {
                event.preventDefault();

                const selectedRating = document.querySelector(".rating-input:checked");
                const feedback = feedbackText.value;

                if (selectedRating && feedback) {
                    const ratingValue = selectedRating.value;
                    // Proses feedback dan rating sesuai kebutuhan Anda
                    console.log("Feedback:", feedback);
                    console.log("Rating:", ratingValue);
                    // Lakukan aksi berikutnya, misalnya, kirim ke server atau tampilkan pesan
                } else {
                    // Tampilkan pesan kesalahan jika diperlukan
                    console.log("Please provide both feedback and rating.");
                }
            });
        });
    </script>

</body>

</html>
