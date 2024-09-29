@foreach ($nama_barang as $nb)
    <a href="/detail_kerja/{{ $nb->slug }}">
        <div class="bg-white w-250 h-400 rounded-xl inline-block drop-shadow-md">
            @if ($nb->image)
                <div style="max-height: 200px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $nb->image) }}" alt="gambar" class="img-fluid rounded-xl w-full h-auto">
                </div>
            @else
                <img src="https://source.unsplash.com/500x400?{{ $nb->kategori }}" alt="gambar" class="rounded-xl w-full h-auto" style="max-height: 200px;">
            @endif

            <div class="text-justify px-2">
                <h1 class="font-bold text-lg">{{ $nb->nama }}</h1>
                <h5 class="text-sm"><i class="bi bi-geo-alt"> </i>Lokasi: {{ $nb->lokasi }}</h5>
                <h5 class="text-sm"><i class="bi bi-tags"></i>Kategori Pekerjaan: {{ $nb->kategori }}</h5>
                <h5 class="text-sm"><i class="bi bi-arrow-left-right"></i>Jumlah Lowongan: {{ $nb->jumlah_lowongan }}</h5>
                {{-- <h5 class="text-sm">{!! $nb->excerpt !!}</h5> --}}

                <h5 class="font-bold text-m mt-2">Upah -Rp. {{ number_format($nb->harga, 0, ',', '.') }}</h5>
                <div class="flex justify-center w-full mt-2">
                    <button class="bg-[#324DAF] rounded-full px-10 py-1 text-white">LAMAR SEKARANG</button>
                </div>
            </div>
        </div>
    </a>
@endforeach
