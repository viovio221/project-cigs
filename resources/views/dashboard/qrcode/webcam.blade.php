<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam | Wayang Riders</title>
    <link rel="stylesheet" href="{{ asset('css/qr.css') }}">
</head>
<body>
    <section id="content">
        <main class="membersdata">
            <div class="head-title">
                <div class="left">
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <h1>Admin Dashboard</h1>
                    @endif
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Take a Picture </a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="/dashboard">Back to dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
<div class="form-group-row">
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-6">
        <div id="my_camera"></div>
        <p>
            <center>  <button type="button" class="btn btn-sm btn-info" onclick="take_picture();">Take a Picture</button></center>
        </p>
    </div>
</div>

<div class="dorm-group row">
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-0">
        <img id="results" />
        <input type="hidden" name="imagescan" class="image-tag">
    </div>
</div>

<div class="modal-footer">
    <form action="/simpan-gambar" method="post">
        @csrf
        <input type="hidden" name="image" id="image-data" />
      <center> <button type="submit" class="btn btn-sm btn-info">Save</button></center>
    </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script>
    window.onload = function () {
        Webcam.set({
    width: 320,
    height: 240,
    image_format: 'jpeg',
    jpeg_quality: 70,
    flip_horiz: true,
    constraints: {
        video: {
            facingMode: 'environment',
            height: 720
        }
    },
    shutter_sound: false,
});

        Webcam.attach('#my_camera');
    };

    function take_picture() {
    Webcam.snap(function (data_url) {
        document.getElementById('results').src = data_url;
        document.getElementById('image-data').value = data_url;
    });
}

</script>
</body>
</html>
