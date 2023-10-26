<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylelogin.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="container">
        @foreach ($profile as $item)
        <div class="img">
            <img src="{{ asset('/storage/' . $item->image) }}" alt="Logo" oncontextmenu="return false;">
        </div>
        @endforeach
        <div class="login-content">
            <form action="{{ route('login.handleLogin') }}" method="POST">
                @csrf
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input type="text" class="input @error('email') is-invalid @enderror" name="email" placeholder="Example: youremail@gmail.com">
                    </div>
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" class="input @error('password') is-invalid @enderror" name="password" placeholder="Input your password">
                    </div>
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <button type="submit" class="btn btn-warning">Login</button>
            </form>
            <form action="{{ route('login.register') }}">
                <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
            <p class="reset-password">Forgot Your Password?</p>
            <p><a href="{{ route('password.request') }}" class="reset-password">Reset Password</a></p>
        </div>
    </div>

    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
