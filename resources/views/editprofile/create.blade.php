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
        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="wrapper">
                <div class="title">
                    Profile Edit
                </div>
                <div class="form">
                    <div class="inputfield">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="input" placeholder="Enter your full name" value="{{ auth()->user()->name }}" readonly>
                    </div>
                    <div class="inputfield">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="input" placeholder="Example: youremail@gmail.com" value="{{ auth()->user()->email }}" readonly>
                    </div>
                    <div class="inputfield">
                        <label for="phone_number">Phone Number</label>
                        <input type="number" name="phone_number" id="phone_number" class="input" placeholder="Enter your phone number" value="{{ auth()->user()->phone_number }}" readonly>
                    </div>


                    <div class="inputfield">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" rows="5" cols="60">

                        </textarea>
                    </div>
                    <div class="inputfield">
                        <label for="province">Province</label>
                        <input type="Text" name="province" id="province" class="input" placeholder="Enter your Province">
                    </div>
                    <div class="inputfield">
                        <label for="city">City</label>
                        <input type="Text" name="city" id="city" class="input" placeholder="Enter your City">
                    </div>
                    <div class="inputfield">
                        <label for="district">district</label>
                        <input type="Text" name="district" id="district" class="input" placeholder="Enter your district">
                    </div>
                    <div class="inputfield">
                        <label for="postalcode">postalcode</label>
                        <input type="Number" name="postalcode" id="postalcode" class="input" placeholder="Enter your postalcode">
                    </div>
                    <form action="{{ route('editprofile.uploadDocument') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="inputfield">
                            <label for="tipe">Document Type</label>
                            <select name="tipe" id="tipe" class="input" required>
                                <option value="KTP">KTP</option>
                                <option value="SIM">SIM</option>
                                <option value="STNK">STNK</option>
                            </select>
                        </div>
                        <div class="inputfield">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="input" accept="image/*" required>
                        </div>
                    </form>

                    <div class="inputfield">
                        <input type="submit" value="Edit" class="btn">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>


