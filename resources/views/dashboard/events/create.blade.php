<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        @foreach ($profiles as $item)
        <title>Add Events | {{ $item->community_name }}</title>
        @endforeach    <link rel="stylesheet" href="{{ asset('css/edit_news.css') }}">
</head>

<body>
    <div class="container mt-5">
        <h1>Tambah Event</h1>
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="users_id" class="form-label">User ID:</label>
                <input type="number" name="users_id" class="form-control" required>
            </div> --}}
            <div class="mb-3">
                <label for="date" class="form-label">Tanggal:</label>
                <input type="date" name="date" class="form-control  @error('date') is-invalid @enderror" required>
                @error('date')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Lokasi:</label>
                <input type="text" name="location" class="form-control  @error('location') is-invalid @enderror" required>

                @error('location')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
            </div>
<div class="form-group">
    <label class="font-weight-bold" >Deskripsi</label>
    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{ old('description') }}</textarea>

    <!-- error message untuk description -->
    @error('description')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="image" class="form-label">Gambar:</label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
    @error('image')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
