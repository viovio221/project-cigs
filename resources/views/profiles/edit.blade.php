<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <link rel="stylesheet" href="{{ asset('css/edit_news.css') }}">

    @if ($profiles)
    <title>Setting CRUD | {{ $profiles->community_name }}</title>
@endif

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Setting</h1>
        <form action="{{ route('profiles.update', ['profiles' => $profiles->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Add this line to indicate the PUT request -->
            <!-- Form fields and submit button -->
            <div class="mb-3">
                <label for="name" class="form-label">History</label>
                <input type="text" name="history" class="form-control  @error('history') is-invalid @enderror"
                    value="{{ $profiles->history }}" required>
                @error('history')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Community</label>
                <textarea class="form-control @error('community_bio') is-invalid @enderror" name="community_bio" rows="5">{{ $profiles->community_bio }}</textarea>
                @error('community_bio')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Current Image</label>
                <img src="{{ asset('storage/profile_images/' . $profiles->image) }}" alt="Profiles Image" width="100">
            </div>

            {{-- <div class="mb-3">
                <label class="form-label">Current Image</label>
                <img src="{{ asset('storage/event_images/' . $event->image) }}" alt="Events Image" width="100">
            </div> --}}
            <div class="form-group">
                <label class="font-weight-bold">Community Structure</label>
                <textarea class="form-control @error('community_structure') is-invalid @enderror" name="community_structure" rows="5">{{ $profiles->community_structure }}</textarea>
                @error('community_structure')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Slogan</label>
                <textarea class="form-control @error('slogan') is-invalid @enderror" name="slogan" rows="5">{{ $profiles->slogan }}</textarea>
                @error('slogan')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Community Name</label>
                <textarea class="form-control @error('community_name') is-invalid @enderror" name="community_name" rows="5">{{ $profiles->community_name }}</textarea>
                @error('community_name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="video" class="form-label">Video</label>
                <input type="file" name="video" class="form-control @error('video') is-invalid @enderror">
                @error('video')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
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
