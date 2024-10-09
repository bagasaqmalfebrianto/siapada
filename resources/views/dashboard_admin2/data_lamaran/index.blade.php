@extends('dashboard_admin2.layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1>BARANG KU</h1>
            </div>

            <a href="{{ url('/dashboard_admin/beri_pekerjaan/create') }}" class="btn btn-primary mb-3">Create New Post</a>

            <div class="table-responsive small">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Upah</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_lamaran as $br)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $br->nama }}</td>
                                <td>{{ $br->user->nama ?? 'N/A' }}</td> <!-- Mengambil nama user -->
                                <td>{{ $br->harga }}</td>
                                <td>
                                    <!-- Form untuk delete -->
                                    <form action="{{ route('data_user.destroy', $br->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                        @csrf
                                        @method('DELETE') <!-- Use DELETE method -->
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
