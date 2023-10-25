<html>
    <head>
        <title>Forgot Password</title>
        <link rel="stylesheet" href="{{ asset('css/forgot.css') }}">
    </head>
    <body><center>
        <div class="main">
            <div class="form">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif

                    @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                    @endif
                    <h2>Forgot Your Password?</h2>
                    <p>Please enter your email or WhatsApp number to request a password reset.</p>
                    <form action="{{ route('password.email') }}" method="post" id="form">
                        @csrf
                        <label for="email_or_whatsapp" class="form-label">Email or WhatsApp Number</label>
                        <input type="text" class="form-control" name="email_or_whatsapp" id="email_or_whatsapp" value="{{ old('email_or_whatsapp') }}">

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
