<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User Event</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <div class="container mt-5">
        <a href="{{ route('events.create') }}" class="btn btn-outline-primary">Tambah Event</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Event</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event_users as $eu)
                    <tr>
                        <td>{{ $eu->name }}</td>
                        <td>{{ $eu->date }}</td>
                        <td>
                            <img src="{{ asset('storage/event_images/' . $event->image) }}" alt="Gambar Event" width="100">
                        </td>
                        <td>{{ $event->link }}</td>
                        <td>
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-info"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            {{-- <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->users_id }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->location }}</td>
                        <td>{{ $event->description }}</td>
                        <td>
                            <img src="{{ asset($event->image) }}" alt="Gambar Event" width="100">
                        </td>
                        <td>{{ $event->link }}</td>
                        <td>
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody> --}}
        </table>
        <div class="d-grid gap-2">
            <a href="{{ 'events.event' }}" class="btn btn-outline-success" style="text-decoration:none;">Posting Data
                ke Halaman Event</a>
        </div> <br>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
