<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Create Property</title>
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('property.update', ['property' => $properties->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label">Headline Event</label>
                <input name="headline_ev" type="text" class="form-control @error('headline_ev') is-invalid @enderror" value="{{ old('headline_ev', $properties->headline_ev) }}" required>
                @error('headline_ev')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Text Event</label>
                <input name="text_ev" type="text" class="form-control @error('text_ev') is-invalid @enderror" value="{{ old('text_ev',$properties->text_ev)  }}" required>
                @error('text_ev')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Headline Message</label>
                <input name="headline_mg" type="text" class="form-control @error('headline_mg') is-invalid @enderror" value="{{ old('headline_mg', $properties->headline_mg) }}">
                @error('headline_mg')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Text Message</label>
                <input name="text_mg" type="text" class="form-control @error('text_mg') is-invalid @enderror" value="{{ old('text_mg', $properties->text_mg) }}">
                @error('text_mg')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Phone Number</label>
                <input name="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number', $properties->phone_number) }}">
                @error('phone_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Instagram</label>
                <input name="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror" value="{{ old('instagram', $properties->instagram) }}">
                @error('instagram')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Facebook</label>
                <input name="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook', $properties->facebook) }}">
                @error('facebook')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Twitter</label>
                <input name="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror" value="{{ old('twitter', $properties->twitter) }}">
                @error('twitter')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $properties->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
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
