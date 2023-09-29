<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if ($profiles)
    <title>Setting CRUD | {{ $profiles->community_name }}</title>
@endif

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</body>

</html>
