<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        @if ($profiles->count() > 0)
        <title>Edit Property | {{ $profiles[0]->community_name }}</title>
        @foreach ($profiles as $profile)
            <p>{{ $profile->community_name }}</p>
        @endforeach
    @endif

    <link rel="stylesheet" href="{{ asset('css/edit_news.css') }}">
</head>

<body>
    <div class="container mt-5">
        <div class="title-news">EDIT NEWS</div>
        <form action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <div class="title">Title</div>
                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                    value="{{ $news->title }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="description">Description</div>
            <div class="form-group">
                <textarea name="description" class="form-control description @error('description') is-invalid @enderror">{{ old('description', $news->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="image">Image</div>
            <div class="mb-3">
                {{-- <label for="image" class="image">Image</label> --}}
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="image">Current Image</div>
            <img src="{{ asset('storage/new_images/' . $news->image) }}" alt="News Image" width="100">
            <button type="submit" class="btn"><b>Submit</b></button>
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
