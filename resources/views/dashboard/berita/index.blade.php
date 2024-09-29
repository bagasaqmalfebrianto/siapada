@extends('dashboard.layout.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>BERITA KU</h1>
    </div>


    <a href="{{ url('/dashboard/berita/create') }}" class="btn btn-primary mb-3">Create New Berita</a>


        <div class="table-responsive small">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Body</th>
            <th scope="col">Action</th>


          </tr>
        </thead>
        <tbody>
            @foreach ($berita as $ikl )

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ikl->title }}</td>
                <td>{{ implode(' ', array_slice(str_word_count($ikl->body, 1), 0, 20)) }}{{ str_word_count($ikl->body) > 20 ? '...' : '' }}</td>


                <td>
                    <a href="/dashboard/berita/{{ $ikl->slug }}"><i class="bi bi-archive"></i></a>
                    <a href="/dashboard/berita/{{ $ikl->slug }}/edit"><i class="bi bi-pencil-square"></i></a>
                    <form action="/dashboard/berita/{{ $ikl->slug }}" class="d-inline" method="post">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle"></i></button>
                    </form>
                </td>
            </tr>


            @endforeach
        </tbody>
      </table>
    </div>
  </main>
@endsection
