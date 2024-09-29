<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}

    {{-- boootsrap icon --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">  --}}

    {{-- ikllna --}}

    <link rel="stylesheet" href="css/style.css">


    @vite('resources/css/app.css')

    <title>Sembako Store | {{ $title }}</title>
</head>

<body class="">

    <header>
        @include('navbar.navmenu')
    </header>

    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col ">
          <!-- Page content here -->
          <div class="overflow-x-auto">
            <table class="table">
              <!-- head -->
              <thead>
                <tr>
                  <th></th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                @foreach ($cart as $cr)

                <tr class="hover">
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $cr->barang->nama }}</td>
                    <td>{{ $cr->jumlah }}</td>
                    <td>{{ $cr->barang->harga }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
        <div class="drawer-side">
          <label for="my-drawer-2" class="drawer-overlay"></label>
          <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
            <!-- Sidebar content here -->
            <li><a>Pesanan Saya</a></li>

            <li><form action="/logout" method="post">
                @csrf
            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
        </form></li>
          </ul>

        </div>
      </div>



    <footer>
        @include('navbar.footer')
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>


</body>

</html>
