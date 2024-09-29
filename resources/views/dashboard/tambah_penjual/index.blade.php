@extends('dashboard.layout.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>List Penjual</h1>
    </div>


    <a href="{{ url('/dashboard/tambah_penjual/create') }}" class="btn btn-primary mb-3">Create New Post</a>


        <div class="table-responsive small">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">no_telp</th>
            <th scope="col">Alamat</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($data_user as $br )

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $br->name }}</td>
                <td>{{ $br->username }}</td>
                <td>{{ $br->email }}</td>
                <td>{{ $br->no_telp }}</td>
                <td>{{ $br->alamat }}</td>
                <td>{{ $br->Action }}</td>

                <td>
                    <a href="/dashboard/barang/{{ $br->slug }}"><i class="bi bi-archive"></i></a>
                    <a href="/dashboard/barang/{{ $br->slug }}/edit"><i class="bi bi-pencil-square"></i></a>
                    <form action="/dashboard/barang/{{ $br->slug }}" class="d-inline" method="post">
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
