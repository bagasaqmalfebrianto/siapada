@extends('dashboard_admin.layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1>BARANG KU</h1>
            </div>
        
        
            <a href="{{ url('/dashboard/barang/create') }}" class="btn btn-primary mb-3">Create New Post</a>
        
        
                <div class="table-responsive small">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Action</th>
        
                  </tr>
                </thead>
                <tbody>
                    @foreach ($barangku as $br )
        
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $br->nama }}</td>
                        <td>{{ $br->stok }}</td>
                        <td>{{ $br->category->nama }}</td>
                        <td>{{ $br->harga }}</td>
                        <td>{{ $br->excerpt }}</td>
        
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
    </div>
    <!-- /.container-fluid -->
@endsection