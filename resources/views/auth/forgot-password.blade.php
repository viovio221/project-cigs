<html>
    <head>
        <title>Forgot Password</title>
        <link rel="stylesheet" href="{{ asset('css/forgot.css') }}">
    </head>
    <br>
    <br>
    <body>
        <center><div class="main">
            <div class="form">
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

                <h2>Forgot Your Password?</h2>
                <p>Please enter your mail to password reset request</p>
                <form action="{{ route('password.email') }}" method="post">
                @csrf
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control1" name="email">
                <br>
                <br>
                <input type="submit" value="Request Password Reset" class="btn btn-secondary w-100 mt-3">
                </form>
                <form action="{{ route('login.index') }}">
                <input type="submit" value="Back To Login" class="btn btn-secondary w-100 mt-3">
                </form>
            </div>
        </div></center>
    </body>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
