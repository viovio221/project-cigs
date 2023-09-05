<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="/css/register_style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<!-- ... (bagian atas halaman HTML) ... -->

<body>
    <div class="body-card">
        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="wrapper">
                <div class="title">
                    Registration Form
                </div>
                <div class="form">
                    <div class="inputfield">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="input" placeholder="Enter your full name">
                    </div>
                    <div class="inputfield">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="input" placeholder="Example: youremail@gmail.com">
                    </div>
                    <div class="inputfield">
                        <label for="phone_number">Phone Number</label>
                        <input type="number" name="phone_number" id="phone_number" class="input" placeholder="Enter your phone number">
                    </div>
                    <div class="inputfield">
                        <label for="password">Password</label>
                        <div class="password-container">
                            <input type="password" name="password" id="password" class="input" placeholder="Enter your Password">
                            <i class="fa fa-eye password-toggle" id="showPassword"></i>
                        </div>
                    </div>
                    <div class="inputfield">
                        <label for="password_confirmation">Confirm Password</label>
                        <div class="password-container">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="input" placeholder="Confirm your Password">
                            <i class="fa fa-eye password-toggle" id="showConfirmPassword"></i>
                        </div>
                    </div>
                    <div class="inputfield">
                        <input type="submit" value="Register" class="btn">
                    </div>
                    <p class="register">Already have an account? <a href="{{ route('login.index') }}" class="login">Login</a></p>
                </div>
            </div>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        const showPassword = document.getElementById('showPassword');
        const showConfirmPassword = document.getElementById('showConfirmPassword');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');

        showPassword.addEventListener('click', function () {
            togglePasswordVisibility(passwordInput, showPassword);
        });

        showConfirmPassword.addEventListener('click', function () {
            togglePasswordVisibility(confirmPasswordInput, showConfirmPassword);
        });

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
    <script>
        Let passwordInput = document.getElementById('txtPassword'),
        toogle = document.getElementById('btnToogle'),
        icon = document.getElementById('eyeIcon');

        function togglePassword(){
            if(passwordInput.type === 'password'){
                passwordInput.type = 'text';
                icon.classList.add("fa-eye-slash");
            }
            else{
                passwordInput.type = 'password';
                icon.classList.remove("fa-eye-slash");
            }
        }

        function checkInput(){
        }

        toggle.addEventListener('click', togglePassword, false);
        toggle.addEventListener('keyup', checkInput, false);
    </script>
        @include('sweetalert::alert')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
