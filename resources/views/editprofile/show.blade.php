<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="box">
            <img src="images/profile-icon-png-912.png" alt="">
            <ul>
                <br>
                <br>
                <li><i style="font-size:24px" class="fa"></i>
                    <i style="font-size:24px" class="fa"></i>
                    <i style="font-size:24px" class="fa"></i></li>
                    <form action="{{ route('dashboard.data_crud') }}">
                        <div class="mb-3 d-grid">
                            <button type="submit" class="button btn-secondary">Back</button>
                        </div>
                    </form>
            </ul>
        </div>
        <div class="About">
            <ul>
                <h1>About Profile</h1>
            </ul>
            <ul>
                <h3>Full Name :</h3>
                <li>{{ auth()->user()->name }}</li>
            </ul>
            <ul>
                <h3>Status :</h3>
                <li>{{ auth()->user()->role }}</li>
            </ul>
            <ul>
                <h3>Email :</h3>
                <li>{{ auth()->user()->email }}</li>
            </ul>
            <ul>
                <h3>Phone Number :</h3>
                <li>{{ auth()->user()->phone_number }}</li>
            </ul>
            <form action="{{ route('editprofile.create') }}">
                <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary">Edit Profile</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
