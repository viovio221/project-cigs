<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @foreach ($profiles as $item)
    <title>Edit Events | {{ $item->community_name }}</title>
    @endforeach    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <div class="container mt-5">
        <h1>Edit Event</h1>
        <form action="{{ route('events.update', ['event' => $event->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Add this line to indicate the PUT request -->
            <!-- Form fields and submit button -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"
                    value="{{ $event->name }}" required>
                @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="users_id" class="form-label">User ID:</label>
                <input type="number" name="users_id" class="form-control" value="{{ $event->users_id }}" required>
            </div> --}}
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" class="form-control  @error('date') is-invalid @enderror"
                    value="{{ $event->date }}" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" class="form-control  @error('location') is-invalid @enderror"
                    value="{{ $event->location }}" required>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{ $event->description }}</textarea>

                <!-- error message untuk description -->
                @error('description')
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
                <img src="{{ asset('storage/event_images/' . $event->image) }}" alt="Events Image" width="100">
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
