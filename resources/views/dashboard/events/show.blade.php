<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Event</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <div class="container mt-5">
        <h1>Detail Event</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $event->name }}</h5>
                <p class="card-text"><strong>Tanggal:</strong> {{ $event->date }}</p>
                <p class="card-text"><strong>Lokasi:</strong> {{ $event->location }}</p>
                <p class="card-text"><strong>Deskripsi:</strong> {!! $event->description !!}</p>
                <p class="card-text"><strong>Gambar:</strong> {{ $event->image }}</p>
            </div>
        </div>
        <a href="{{ route('dashboard.data_crud') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</body>
</html>
