@extends('layout.main')

@section('container')


<div class="carousel w-full">

    {{-- Contoh Kode --}}
    @foreach ($iklans as $key => $iklan)
        @if ($loop->first)
            <div id="slide{{ $key }}" class="carousel-item relative w-full">
                <img src="{{ asset('storage/' . $iklan->image) }}" class="w-full" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide{{ $iklan->count() }}" class="btn btn-circle">❮</a>
                    <a href="#slide{{ $key + 1 }}" class="btn btn-circle">❯</a>
                </div>
            </div>
        @endif

        <div id="slide{{ $key }}" class="carousel-item relative w-full">
            <img src="{{ asset('storage/' . $iklan->image) }}" class="w-full" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide{{ $key - 1 }}" class="btn btn-circle">❮</a>
                <a href="#slide{{ $key + 1 }}" class="btn btn-circle">❯</a>
            </div>
        </div>

        @if ($loop->last)
            <div id="slide{{ $key }}" class="carousel-item relative w-full">
                <img src="{{ asset('storage/' . $iklan->image) }}" class="w-full" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide{{ $key - 1 }}" class="btn btn-circle">❮</a>
                    <a href="#slide{{ $key == 0 ? $key : 0 }}" class="btn btn-circle">❯</a>
                </div>
            </div>
        @endif
    @endforeach
    {{-- End --}}

</div>
    <!-- ISI -->

                <ul class="flex justify-between">
                    <li>
                        <a href="#" class="font-bold text-lg text-[#324DAF]">PEKERJAAN</a>
                    </li>
                    
                    <li>
                        <a href="#" class="font-bold text-lg text-[#324DAF]">SELENGKAPNYA</a>
                    </li>
                </ul>
            <hr class="border-t border-black">

            <div class="drop-shadow-[0_5px_2px_rgba(0,0,0,0.25)] mt-3 flex justify-center items-center">
                <ul class="grid grid-cols-4 gap-4">
                     @foreach ($nama_barang as $nb )
                     {{-- {{ dd($nb) }} --}}

                        <li>
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
                        </li>
                    @endforeach

                </ul>
            </div>

            <!--SELENGKAPNYA -->
            <div class="flex justify-center m-10">
                <div >
                    <input type="hidden" id="offset" value="0">
                    <input type="hidden" id="limit" value="3">

                    <!-- Tombol Selengkapnya -->
                    <a class="bg-[#324DAF] px-10 py-2 rounded-full text-white" >Selengkapnya</a>

                </div>
            </div>

            <hr class="border-t border-black">

            <h1 class="my-5 font-bold text-lg text-[#324DAF]" >BERITA TERKAIT</h1>

            @include('konten.berita')

            <div class="flex justify-center m-10">
                <div class="bg-[#324DAF] px-10 py-2 rounded-full text-white">

                        <button id="show-more">Selengkapnya</button>

                </div>
            </div>






@endsection





