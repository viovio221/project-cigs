<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Password</title>
    <link rel="stylesheet" href="/css/newpass.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="body-card">
        <form action="{{ route('password.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            @endif
            @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
            @endif
            <div class="wrapper">
                <div class="title">
                    Change Password
                </div>
                <div class="form">
                    <input type="hidden" name="token" value="{{ request()->token }}">
                    <input type="hidden" name="email" value="{{ request()->email }}">
                    <div class="inputfield">
                        <label for="password">New Password</label>
                        <div class="password-container">
                            <input type="password" name="password" id="password" class="input" placeholder="New Password">
                            <i class="fa fa-eye password-toggle" id="showPassword"></i>
                        </div>
                    </div>
                    <br>
                    <div class="inputfield">
                        <label for="password">Confirm Password</label>
                        <div class="password-container">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="input" placeholder="Confirm Password">
                            <i class="fas fa-eye-slash password-toggle" id="showConfirmPassword"></i>
                        </div>
                    </div>
                    <br>
                    <div class="inputfield">
                        <input type="submit" value="Update Password" class="btn">
                    </div>
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
</body>
</html>
