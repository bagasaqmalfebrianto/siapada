@extends('dashboard_admin.layout.main')

@section('container')
    <div class="container-fluid">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1>Permintaan Lamaran</h1>
            </div>

            <div class="table-responsive small">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Nama</th> <!-- Nama pengguna -->
                            <th scope="col">Status</th> <!-- Status cart -->
                            {{-- <th scope="col">Link WhatsApp</th> <!-- Link WhatsApp --> --}}
                            <th scope="col">Action</th> <!-- Action for updating status -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cart->barang->nama }}</td> <!-- Nama barang -->
                                <td>{{ $cart->user->nama ?? 'N/A' }}</td> <!-- Nama pengguna -->
                                <td>{{ $cart->status }}</td> <!-- Status cart -->
                                <td>
                                    <form action="{{ route('permintaan_lamaran.update', $cart->id) }}" method="POST">
                                        @csrf
                                        @method('PUT') <!-- Use PUT method -->
                                        <input type="text" name="whatsapp_link" value="{{ $cart->whatsapp_link }}" placeholder="Link WhatsApp" />
                                        <select name="status" onchange="this.form.submit()">
                                            <option value="pending" {{ $cart->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved" {{ $cart->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="rejected" {{ $cart->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                        <button type="submit">Update</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
