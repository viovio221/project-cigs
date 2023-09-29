<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @foreach ($profiles as $item)
    <title>Edit Comment Posts | {{ $item->community_name }}</title>
    @endforeach  </head>
  <body>
<div class="container mt-5">
    <h1>Edit Comment Post</h1>
    <form action="{{ route('comment_posts.update', $comment_post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Username</label>
            <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $comment_post->username) }}">
            @error('username')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>
        <div class="mb-3">
            <label class="form-label">Event Name</label>
            <select name="event_id" class="form-control @error('event_id') is-invalid @enderror">
                <option value="">Pilih</option>
                @foreach ($event as $ev)
                    <option {{ old('event_id', $comment_post->event_id) == $ev->id ? 'selected' : '' }} value="{{ $ev->id }}">{{ $ev->name }}</option>
                @endforeach
            </select>
            @error('event_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Content</label>
            <input name="content" type="text" class="form-control @error('content') is-invalid @enderror" value="{{ old('content', $comment_post->content) }}">
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Rating</label>
            <div class="rating">
                <input type="number" name="rating" hidden value="{{ old('rating', $comment_post->rating) }}">
                @for ($i = 1; $i <= 5; $i++)
                    <i class='bx bx-star star @if ($i <= old('rating', $comment_post->rating)) bxs-star @else bx-star @endif' style="--i: {{ $i }}" data-rating="{{ $i }}"></i>
                @endfor
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<!-- Your JavaScript code for handling rating selection goes here -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Your JavaScript code for handling rating selection goes here -->
<script>
    const allStar = document.querySelectorAll('.rating .star')
    const ratingValue = document.querySelector('.rating input')

    allStar.forEach((item) => {
        item.addEventListener('click', function() {
            const rating = item.getAttribute('data-rating');
            ratingValue.value = rating;

            allStar.forEach((i) => {
                const index = parseInt(i.getAttribute('data-rating'));
                if (index <= rating) {
                    i.classList.replace('bx-star', 'bxs-star');
                } else {
                    i.classList.replace('bxs-star', 'bx-star');
                }
            });
        });
    });
</script>
</body>
</html>
