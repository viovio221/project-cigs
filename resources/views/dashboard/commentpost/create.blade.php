<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Comment Post</title>
  </head>
  <body>
<div class="container mt-5">
    <form action="{{ route("comment_posts.store")}}" method="post">
        @csrf
        @method('post')
        <div class="form-group">
            <label class="form-label">Username</label>
            <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ auth()->user()->name }}" readonly>
            @error('username')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>
          {{-- <div class="inputfield">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" class="input" placeholder="Enter your full name" value="{{ auth()->user()->name }}" readonly>
        </div> --}}
        <div class="mb-3">
            <label class="form-label">Event Name</label>
            <select name="event_id" class="form-control @error('event_id') is-invalid @enderror">
                <option value="">Pilih</option>
                @foreach ($event as $ev)
                    <option @selected(old('event') == $ev->id) value="{{ $ev->id }}">{{ $ev->name }}</option>
                @endforeach
            </select>
            @error('event_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
          <label class="form-label">Content</label>
          <input name="content" type="text" class="form-control @error('content') is-invalid @enderror">
          @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
