@extends('layout.main')

@section('container')
    <div class="w-1200 h-auto flex-shrink-0 border border-gray-300 rounded-r-md">

        {{-- BAGIAN FOTO --}}
        <div class="p-5">

            <div class="flex">
                <div class="w-1/3">

                    <img src="{{ asset('storage/' . $barang->image) }}" alt="gambar"
                        class="rounded-xl object-cover w-250 h-auto">
                    {{-- <img src="/images/bagas.png" alt="" class="w-250 h-auto"> --}}
                    {{-- <div class="flex pt-2">
                        <img src="https://source.unsplash.com/500x400?{{ $barang->kategori }}" alt="gambar"
                            class="rounded-xl object-cover w-20 h-auto">
                        <img src="https://source.unsplash.com/500x400?{{ $barang->kategori }}" alt="gambar"
                            class="rounded-xl object-cover w-20 h-auto px-2">
                        <img src="https://source.unsplash.com/500x400?{{ $barang->kategori }}" alt="gambar"
                            class="rounded-xl object-cover w-20 h-auto">
                    </div> --}}
                </div>
                <form action="{{ url('/detail_kerja/' . $barang->slug) }}" method="POST">
                    @csrf
                    <div class="w-auto">
                        <h1 class="text-24 font-bold">{{ $barang->nama }}</h1>
                        <h3 class="flex items-center gap-x-2"><i class="bi bi-geo-alt"> </i>Lokasi : {{$barang->lokasi}}</h3>
                        <h3 class="flex items-center gap-x-2"><i class="bi bi-tags"></i>Kategori Pekerjaan : {{ $barang->category->nama }}</h3>
                        <h3 class="flex items-center gap-x-2"><i class="bi bi-arrow-left-right"></i>Lowongan Dibutuhkan : {{ $barang->stok }}</h3>
                        <h3 class="text-[#324DAF] font-bold">Pendpatan : Rp. {{ $barang->harga }}</h3>

                        <div class="flex gap-3 mt-5">

                            {{-- <div class="mt-1 font-bold">
                                <h1>KUANTITAS</h1>
                            </div>
                            <div class="flex items-center space-x-2">
                                <a href="javascript:void(0)"
                                    class="decrement bg-blue-500 text-white px-3 py-1 rounded-full focus:outline-none focus:ring focus:border-blue-300">-</a>
                                <input type="text" name="jumlah"
                                    class="item-quantity border border-gray-300 w-12 text-center focus:outline-none focus:ring focus:border-blue-300 px-5"
                                    value="1" min="1">

                                <a href="javascript:void(0)"
                                    class="increment bg-blue-500 text-white px-3 py-1 rounded-full focus:outline-none focus:ring focus:border-blue-300">+</a>
                            </div>

                            <a href=""><i class="bi bi-cart-plus text-30"></i></a> --}}
                             <!-- Input hidden untuk jumlah -->
                             <input type="hidden" name="jumlah" value="1">
                             <input type="hidden" name="status" value="Menunggu">


                             <button type="button" class="bg-[#324DAF] text-white px-10 py-2 rounded-md" onclick="checkLogin()">Lamar Pekerjaan</button>

                        </div>
                    </div>
                </form>
            </div>


            {{-- BAGIAN JENIS PRODUK --}}

            <div class="mt-7">
                <h1 class="text-text-[#324DAF] text-24 font-bold">DESKRIPSI PEKERJAAN</h1>
                <hr class="border-t border-black">

                <div class="py-3">
                    <h1>{!! $barang->body !!}</h1>
                </div>
            </div>

            {{-- BAGIAN DESKRIPSI PRODUK --}}

            {{-- <div>
                <h1 class="text-text-[#324DAF] text-24 font-bold">DESKRIPSI PRODUK</h1>
                <hr class="border-t border-black">

                <div class="py-3">
                    <h1>{!! $barang->body !!}</h1>
                </div>
            </div> --}}
        </div>

    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const incrementButtons = document.querySelectorAll('.increment');
        const decrementButtons = document.querySelectorAll('.decrement');
        const quantityElements = document.querySelectorAll('.item-quantity');

        incrementButtons.forEach((button, index) => {
            button.addEventListener('click', function() {
                // Mengambil nilai saat ini dari input
                let quantity = parseInt(quantityElements[index].value);

                // Menambahkan 1 ke nilai
                quantity++;

                // Memperbarui nilai di input
                quantityElements[index].value = quantity;
            });
        });

        decrementButtons.forEach((button, index) => {
            button.addEventListener('click', function() {
                // Mengambil nilai saat ini dari input
                let quantity = parseInt(quantityElements[index].value);

                // Memastikan nilai tidak kurang dari 1
                if (quantity > 1) {
                    // Mengurangkan 1 dari nilai
                    quantity--;

                    // Memperbarui nilai di input
                    quantityElements[index].value = quantity;
                }
            });
        });
    });

    function checkLogin() {
        // Cek status login, misalkan dengan variabel isLoggedIn
        // Anda bisa menggunakan variabel ini dari PHP jika diperlukan
        const isLoggedIn = @json(auth()->check());

        if (!isLoggedIn) {
            // Notifikasi bahwa pengguna harus login
            alert('Silakan login terlebih dahulu untuk melamar pekerjaan.');
            // Redirect ke halaman login
            window.location.href = "{{ url('/login') }}"; // Ganti dengan URL login yang sesuai
        } else {
            // Jika sudah login, submit form
            document.querySelector('form').submit(); // Menyubmit form
        }
    }
</script>
