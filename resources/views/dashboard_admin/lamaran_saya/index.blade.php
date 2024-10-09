@extends('dashboard_admin.layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1>Lamaran Saya</h1>
            </div>
        
            <div class="table-responsive small">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th> <!-- Tambahkan kolom untuk action -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $br)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $br->barang->nama }}</td>
                                <td>{{ $br->barang->lokasi }}</td>
                                <td>{{ $br->status }}</td>

                                <td>
                                    @if ($br->status === 'approved')
                                        <a href="{{ $br->whatsapp_link }}" target="_blank" class="btn btn-success btn-sm">WhatsApp</a> <!-- Tampilkan tombol jika approved -->
                                    @else
                                        N/A <!-- Tampilkan N/A jika status bukan approved -->
                                    @endif
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
