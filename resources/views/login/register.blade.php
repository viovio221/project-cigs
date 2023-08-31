<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="/css/register_style.css">
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
                        <input type="password" name="password" id="password" class="input" placeholder="Enter your password">
                    </div>
                    <div class="inputfield">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="input" placeholder="Confirm your password">
                    </div>
                    <div class="inputfield">
                        <input type="submit" value="Register" class="btn">
                    </div>
                    <p class="register">Already have an account? <a href="{{ route('login.index') }}" class="login">Login</a></p>
                </div>
            </div>
        </form>
    </div>
</body>
</html>


