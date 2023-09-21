<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saran Dan Kritik</title>
    <link rel="stylesheet" href="{{asset('css/style_kritik.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>
    {{-- <form method="POST" action="{{ route('submit_form') }}">
        @csrf --}}
    <div class="container">

        <div class="card-container">
            <div class="left">
                <div class="left-container">
                    <h2 class="wyg">Wayang Riders</h2>
                    <p>After participating in the event, we'll guide you to the criticism and suggestions page. Here, you can share your
                        experience and provide feedback about the event you've attended. Thank you for your participation in
                        our motorcycle community!</p>
                        <br>
                        <br>
                        <p>Connect with us:</p>
                    <div class="social-icons">
                        <a href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                    </div>
                    <br>
                    <p></p>
                </div>
            </div>
            <div class="right">
                <div class="right-container">
                    <form action="{{ route('message.store') }}" method="post">
                        @csrf
                        <!-- Hapus @method("POST") karena Anda menggunakan metode POST -->
                        <h2 class="lg-view">Wayang Riders</h2>
                        <p>Please give criticism and suggestions that could be better.</p>
                        <div class="input-container">
                            <!-- Tambahkan input untuk user_id, asumsikan ada input dengan nama 'user_id' yang sesuai -->
                            <input type="text" name="name" class="input" value="{{ auth()->user()->name }}" disabled>
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> <!-- Input tersembunyi untuk user_id -->
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" placeholder="criticism and suggestions here" rows="10" class="form-control">{{ old('message') }}</textarea>
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</body>
