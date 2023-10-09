<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="{{ asset('css/register_style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <span class="big-circle"></span>
        <div class="form">
            <div class="contact-info">
                <h3 class="title">Welcome to Wayang Riders Register</h3>
                <p class="text">
                    After registering, we will direct you to the dashboard page where you can share your experience and provide feedback about the event you attended. Thank you for being a part of our motorcycle community!
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
                        <a href="/">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="body-card">
                <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="title">
                        Registration Form
                    </div>
                    <div class="inputfield">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="input"
                            placeholder="Enter your full name">
                    </div>
                    <div class="inputfield">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="input"
                            placeholder="Example: youremail@gmail.com">
                    </div>
                    <div class="inputfield">
                        <label for="phone_number">Phone Number</label>
                        <input type="number" name="phone_number" id="phone_number" class="input"
                            placeholder="Enter your phone number">
                    </div>
                    <div class="inputfield">
                        <label for="password">Password</label>
                        <div class="password-container">
                            <input type="password" name="password" id="password" class="input"
                                placeholder="Enter your Password">
                            <span class="password-toggle" id="showPassword">
                                <i class="fa fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                    <div class="inputfield">
                        <label for="password_confirmation">Confirm Password</label>
                        <div class="password-container">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="input" placeholder="Confirm your Password">
                            <span class="password-toggle" id="showConfirmPassword">
                                <i class="fa fa-eye-slash"></i>
                            </span>
                        </div>
                    </div> <br>
                    <div class="inputfield">
                        <input type="submit" value="Register" class="btn">
                    </div>
                    <div class="inputfield center">
                        <p class="register">Already have an account? <a href="{{ route('login.index') }}" class="login"
                                style="text-decoration: none; color: orange;">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const showPassword = document.getElementById('showPassword');
        const showConfirmPassword = document.getElementById('showConfirmPassword');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');

        if (showPassword && showConfirmPassword) {
            showPassword.addEventListener('click', function() {
                togglePasswordVisibility(passwordInput, showPassword);
            });

            showConfirmPassword.addEventListener('click', function() {
                togglePasswordVisibility(confirmPasswordInput, showConfirmPassword);
            });
        }

        function togglePasswordVisibility(input, icon) {
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }
    </script>

    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
