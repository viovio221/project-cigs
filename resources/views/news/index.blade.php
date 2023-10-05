{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Message</title>
  </head>
  <body>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3><a href="{{ route('news.create') }}" class="btn btn-outline-primary">Tambah Event</a></h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @if (isset($messages)) --}}
                    {{-- @foreach ($newslist as $nw)
                        <tr>
                            <td>{{ $nw->title }}</td>
                            <td>{!! $nw->description !!}</td>
                            <td>
                                <img src="{{ asset('storage/event_images/' . $nw->image) }}" alt="News"
                                    width="100">
                            </td>
                            <td class="side-menu top">
                                <a href="{{ route('news.show', $nw->id) }}" style="color: green"><i
                                        class='bx bx-info-circle'></i></a>
                                <a href="{{ route('news.edit', ['event' => $nw->id]) }}" method="post"
                                    style="color: orange"><i class='bx bx-edit'></i></a>
                                <form action="{{ route('news.destroy', $nw->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none; color:red"><i
                                            class='bx bx-trash'></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{-- @endif --}}
                {{-- </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html> --}} --}} --}}
