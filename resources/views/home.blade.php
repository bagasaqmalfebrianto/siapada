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
                </ul>
            <hr class="border-t border-black">

            <div class="drop-shadow-[0_5px_2px_rgba(0,0,0,0.25)] mt-3 flex justify-center items-center">
                <ul class="grid grid-cols-4 gap-4">
                    @foreach ($nama_barang as $nb )
                    {{-- {{ dd($nb) }} --}}

                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $nb->title }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $nb->nama_perusahaan }}</p>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $nb->jenis }}</p>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"/>
                            </svg>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $nb->type }}</p>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.03v13m0-13c-2.819-.831-4.715-1.076-8.029-1.023A.99.99 0 0 0 3 6v11c0 .563.466 1.014 1.03 1.007 3.122-.043 5.018.212 7.97 1.023m0-13c2.819-.831 4.715-1.076 8.029-1.023A.99.99 0 0 1 21 6v11c0 .563-.466 1.014-1.03 1.007-3.122-.043-5.018.212-7.97 1.023"/>
                            </svg>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $nb->pendidikan }}</p>
                        </div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Rp{{ $nb->gaji_minimum }}-Rp{{ $nb->gaji_maksimum }}</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                    @endforeach

                </ul>
            </div>

            <!--SELENGKAPNYA -->
            <div class="flex justify-center m-10">
                <div >
                    <input type="hidden" id="offset" value="0">
                    <input type="hidden" id="limit" value="3">
                    <!-- Tombol Selengkapnya -->
                    <a href="/cari_kerja" class="bg-[#324DAF] px-10 py-2 rounded-full text-white" >Selengkapnya</a>

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





