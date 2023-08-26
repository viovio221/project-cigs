<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="/css/register_style.css">
</head>
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
                        <input type="text" name="name" id="name" class="input">
                    </div>
                    <div class="inputfield">
                        <label>Gender</label>
                        <div class="custom_select">
                            <select name="gender">
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="inputfield">
                        <label for="date_birth">Date Of Birth</label>
                        <input type="date" name="date_birth" id="date_birth" class="input">
                    </div>
                    <div class="inputfield">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="input">
                    </div>
                    <div class="inputfield">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="input">
                    </div>
                    <div class="inputfield">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="input">
                    </div>
                    <div class="inputfield">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="textarea"></textarea>
                    </div>
                    <div class="inputfield">
                        <label for="province">Province</label>
                        <input type="text" name="province" id="province" class="input">
                    </div>
                    <div class="inputfield">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="input">
                    </div>
                    <div class="inputfield">
                        <label for="district">District</label>
                        <input type="text" name="district" id="district" class="input">
                    </div>                    <div class="inputfield">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" name="postal_code" id="postal_code" class="input">
                    </div>
                    <div class="inputfield">
                        <input type="submit" value="Register" class="btn">
                        <a href="{{ route('login.index') }}">have an account?</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>


