<html>
    <head>
        <title>Forgot Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <style>
        body{
            background: orange
        }
        .main{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form{
            background: #fff;
            padding: 50px 30px;
        }
    </style>
    <body>
        <div class="main">
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
                <p>please enter your mail to password reset request</p>
                <form action="{{ route('password.email') }}" method="post">
                @csrf
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
                <input type="submit" value="Request Password Reset" class="btn btn-secondary w-100 mt-3">
                </form>
            </div>
        </div>
    </body>
</html>
