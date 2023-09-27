<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/readmore.css') }}">
</head>
<body>
    <div class="container">
        <div class="news-heading">NEWS</div>
        <div class="yellow-bar"></div>
        <div class="title"><b>{{ $nw->title }}</b></div>

        <div class="white-box">
            <img class="image" src="{{ asset('storage/new_images/' . $nw->image) }}" />
            <div class="website">WayangRiders.com-</div>
            <div class="description">
                <b>{{ $nw->description }}</b>
            </div>
            <div class="text">
                {{ $nw->content }}
            </div>
        </div>
    </div>
</body>
</html>
