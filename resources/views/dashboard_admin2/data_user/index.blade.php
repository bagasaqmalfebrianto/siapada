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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Status Akun</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_user as $br)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $br->name }}</td>
                                <td>{{ $br->email }}</td>
                                <td>{{ $br->no_telp }}</td>
                                <td>{{ $br->alamat }}</td>
                                <td>
                                  @if($br->is_locked == 1)
                                      Terkunci
                                      <form action="{{ route('data_user.update', $br->id) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method('PUT')
                                          <input type="hidden" name="is_locked" value="0">
                                          <input type="hidden" name="reset_attempts" value="true">
                                          <button class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin ingin membuka akun ini?')">Buka Akun</button>
                                      </form>
                                  @else
                                      Aktif
                                  @endif
                              </td>
                              
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
