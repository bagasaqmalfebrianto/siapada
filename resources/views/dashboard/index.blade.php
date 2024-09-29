@extends('dashboard.layout.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    </div>

    <h2>Welcom Back, {{ auth()->user()->name }}</h2>


    @can('admin')
    <div class="table-responsive small mt-10">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Harga</th>
              <th scope="col">Tanggal Beli</th>
              <th scope="col">Action</th>


            </tr>
          </thead>
          <tbody>
              @foreach ($carts as $cr )

              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $cr->user->name }}</td>
                  <td>{{ $cr->barang->nama }}</td>
                  <td>{{ $cr->jumlah }}</td>
                  <td>{{ $cr->barang->harga }}</td>
                  <td>{{ $cr->created_at }}</td>
              </tr>

              @endforeach
          </tbody>
        </table>
      </div>
    @endcan
  </main>
@endsection
