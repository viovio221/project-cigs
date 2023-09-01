<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Message</title>
  </head>
  <body>
<div class="container mt-5">
            <h1 class="text-center mb-4">Setting</h1>
             {{-- <a href="{{route ('setting.create') }}" class="btn btn-primary mb-3">Tambah setting</a> --}}
        <div class="card">
            <div class="card-body">
                <table class="table" style="background-color: #fa9b1e">
                    <thead>
                        <th>No</th>
                        <th>History</th>
                        <th>Community Bio</th>
                        <th>Image</th>
                        <th>Community Structure</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($profiles as $no => $pf )
                            <tr">
                                <th>{{ $no+1}}</th>
                                <td>{{$pf->history}}</td>
                                <td>{{$pf->community_bio}}</td>
                                <td><img style="max-width:200px;max-height:200px;" src="{{ url('public/profile_images/'.$pf->image) }}"></td>
                                <td>{{$pf->community_structure}}</td>
                                <td>
                                    @csrf
                                    @method('DELETE')
                                    {{-- <a href="{{ route('setting.show', $pf->id) }}" class="btn btn-warning btn-sm">Read</a> --}}
                                    {{-- <a href="{{ url('profile/'.$pf->id.'/show') }}" class="btn btn-warning btn-sm">Read</a> --}}
                                    <a href="{{ route('profiles.edit', $pf->id) }}" class="btn btn-success btn-sm">Edit</a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
