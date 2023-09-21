<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit</title>
    <link rel="stylesheet" href="/css/register_style.css">
</head>
<!-- ... (bagian atas halaman HTML) ... -->

<body>
    <div class="body-card">
        <form action="{{ route('editprofile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="wrapper">
                <div class="title">
                    Profile Edit
                </div>
                <div class="form">
                    <div class="inputfield">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="input"
                            placeholder="Enter your full name" value="{{ auth()->user()->name }}" readonly>
                    </div>
                    <div class="inputfield">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="input"
                            placeholder="Example: youremail@gmail.com" value="{{ auth()->user()->email }}" readonly>
                    </div>
                    <div class="inputfield">
                        <label for="phone_number">Phone Number</label>
                        <input type="number" name="phone_number" id="phone_number" class="input"
                            placeholder="Enter your phone number" value="{{ auth()->user()->phone_number }}" readonly>
                    </div>
                    <div class="inputfield">
                        <label for="role">Role</label>
                        <input type="text" name="role" id="role" class="input" placeholder="Enter your role"
                            value="{{ auth()->user()->role }}" readonly>
                    </div>
                    <div class="inputfield">
                        <label for="gender">Gender</label>
                        <input type="text" name="gender" id="gender" class="input"
                            placeholder="Enter your gender" value="{{ auth()->user()->gender }}" readonly>
                    </div>
                    <div class="inputfield">
                        <label for="date_birth">Date Birth</label>
                        <input type="date" name="date_birth" id="date_birth" class="input" value="{{ auth()->user()->date_birth }}">
                    </div>
                    <div class="inputfield">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" rows="5" cols="60">
                        </textarea>
                    </div>
                    <div class="inputfield">
                        <label for="province">Province</label>
                        <input type="Text" name="province" id="province" class="input"
                            placeholder="Enter your Province">
                    </div>
                    <div class="inputfield">
                        <label for="city">City</label>
                        <input type="Text" name="city" id="city" class="input"
                            placeholder="Enter your City">
                    </div>
                    <div class="inputfield">
                        <label for="district">district</label>
                        <input type="Text" name="district" id="district" class="input"
                            placeholder="Enter your district">
                    </div>
                    <div class="inputfield">
                        <label for="postalcode">Postal Code</label>
                        <input type="number" name="postal_code" id="postal_code" class="input" placeholder="Enter your postal code">
                    </div>
                    <div class="inputfield">
                        <input type="submit" value="Edit" class="btn">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>