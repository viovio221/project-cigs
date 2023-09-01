<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <img class="wave" src="{{ asset('') }}" alt="">
    <div class="container">
        <div class="img">
            <img src="{{ asset('images/209408166-biker-man-riding-motorcycle-removebg-preview.png') }}" alt="">
        </div>
        <div class="login-content">
            <form action="dashboard/data_crud" >
                <img src="{{ asset('images/orangeprofile1.png') }}" alt="">
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input type="text" class="input" placeholder="Example: youremail@gmail.com">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" class="input" placeholder="Input your password">
                    </div>
                </div>
                <br>
                <input type="submit" class="btn btn-warning" value="Login">
            </form>
            <form action="login/register">
                <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
            <p class="reset-password">Forgot Your Password?</p>
                <p><a href="/forgot-password" class="reset-password">Reset Password</a></p>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
