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
                    Enter Your Email
                </div>
                <div class="form">
                    <div class="inputfield">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="input" placeholder="Enter Your Email">
                    </div>
                    <div class="inputfield">
                        <input type="submit" value="Enter" class="btn">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>


