<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @foreach ($profiles as $item)
    <title>Create News| {{ $item->community_name }}</title>
    @endforeach

  </head>
  <body>
<div class="container mt-5">
    <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label class="form-label">Title</label>
          <input name="title" type="text" class="form-control @error('title') is-invalid @enderror">
          @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Description</label>
            <input name="description" type="text" class="form-control @error('description') is-invalid @enderror">
            @error('description')
              <div class="invalid-feedback">{{ $message }}</div>
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
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
