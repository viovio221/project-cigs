<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="{{ asset('css/forgot.css') }}">
</head>

<body>
    <center><div class="main">
        <div class="form">
            <h2>OTP CODE</h2>
            <p>Please enter your OTP code for registration</p>
            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <div class="inputfield">
                    <label for="otp_code" class="form-label"></label>
                    <input type="text" class="form-control" name="otp_code">
                </div>

                <div class="inputfield">
                    <input type="submit" value="Verify OTP" class="btn btn-secondary w-100 mt-3">
                </div>

                @error('otp_code')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </form>

            <div class="otp-expiry" id="otp-expiry">Your OTP code will expire in <span id="countdown">5:00</span> minutes</div>
        </div>
    </div></center>
   <!-- Bagian lain dari kode HTML Anda -->

<script>
    function startCountdown(duration, display) {
        let timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                // Di sini Anda dapat menentukan tindakan apa yang akan dilakukan setelah penghitungan mundur selesai
                // Misalnya, mungkin Anda ingin menonaktifkan formulir atau melakukan tindakan lainnya.
                // timer = duration; // Jika ingin mengulang penghitungan mundur setelah mencapai 0.
                display.textContent = "Expired"; // Menampilkan pesan saat waktu habis.
            }
        }, 1000);
    }

    window.onload = function () {
        let countdown = 300; // Mengatur waktu countdown dalam detik (misalnya 300 detik setara dengan 5 menit)
        let display = document.querySelector('#countdown');
        startCountdown(countdown, display);

        // Kode lain di sini
    };
</script>

<!-- Bagian lain dari kode HTML Anda -->

</body>

</html>
