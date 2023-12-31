<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @foreach ($profiles as $item)
        <title>History | {{ $item->community_name }}</title>
    @endforeach
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style_history.css') }}" />
</head>

<body>
    <main>
        <header id="header">
            <nav>
                <div class="container">
                </div>
            </nav>
            <br>
            <div class="header-content">
                <div class="container grid-2">
                    <div class="column-1">
                        <p class="text">
                            @foreach ($profiles as $item)
                                {{ $item->community_bio }}
                            @endforeach
                        </p>
                    </div>

                    <div class="column-2 image">
                        @foreach ($profiles as $item)
                            <td>
                                <img src="{{ asset('/storage/' . $item->image) }}" alt="Logo" oncontextmenu="return false;">
                            </td>
                        @endforeach
                    </div>
                </div>
            </div>
        </header>

        <section class="about section" id="about">
            <div class="container">
                <div class="section-header">
                    <h3 class="title" data-title="What That's">Wayang Riders</h3>
                </div>

                <div class="section-body">
                    <div class="column-1">
                        <h3 class="title-sm">History</h3>
                        <p class="text">
                            @foreach ($profiles as $item)
                                {{ $item->history }}
                            @endforeach
                        </p>

                    </div>

                    <div class="column-2 image">

                    </div>
                </div>
            </div>
        </section>

        <section class="records">
            <div class="overlay overlay-sm">
            </div>

            <div class="container">
                <div class="wrap">
                    <div class="record-circle">
                        <h2 class="number" data-num="{{ $dataCount }}"> {{ $dataCount }} </h2>
                        <h4 class="sub-title">MEMBERS</h4>
                    </div>
                </div>
            </div>
        </section </div>
        </div>
        </div>
        </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>
