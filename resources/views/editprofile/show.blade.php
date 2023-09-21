<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
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
                        <tr>
                            <th><i style="font-size:24px" class="fa"></i></th>
                            <th><i style="font-size:24px" class="fa"></i></th>
                            <th><i style="font-size:24px" class="fa"></i></th>
                        </tr>
                <form action="{{ route('dashboard.data_crud') }}">
                    <div class="mb-3 d-grid">
                        <button type="submit" class="button btn-secondary"><b>BACK</b></button>
                    </div>
                </form>
            </ul>
        </div>
        <div class="About">
            <ul>
                <h1><b>ABOUT PROFILE</b></h1>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>Full Name </th>
                        <td>{{ auth()->user()->name }}</td>
                    </tr>
                </table>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>Status </th>
                        <td>{{ auth()->user()->role }}</td>
                    </tr>
                </table>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>Email </th>
                        <td>{{ auth()->user()->email }}</td>
                    </tr>
                </table>
            </ul>
            <ul>
                <table>
                    <tr>
                        <th>Phone Number </th>
                        <td>{{ auth()->user()->phone_number }}</td>
                    </tr>
                </table>
            </ul>
            <form action="{{ route('editprofile.edit') }}">
                <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary"><b>Edit Profile</b></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
