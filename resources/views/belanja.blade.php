@extends('layout.main')

@section('container')
    {{-- @include("konten.iklan") --}}

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


        {{-- <div id="slide1" class="carousel-item relative w-full">
            <img src="{{ asset('images/promo-1.jpeg') }}" class="w-full" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide3" class="btn btn-circle">❮</a>
                <a href="#slide2" class="btn btn-circle">❯</a>
            </div>
        </div>
        <div id="slide2" class="carousel-item relative w-full">
            <img src="{{ asset('images/promo-2.png') }}" class="w-full" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide1" class="btn btn-circle">❮</a>
                <a href="#slide3" class="btn btn-circle">❯</a>
            </div>
        </div>
        <div id="slide3" class="carousel-item relative w-full">
            <img src="{{ asset('images/promo-3.png') }}" class="w-full" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide2" class="btn btn-circle">❮</a>
                <a href="#slide1" class="btn btn-circle">❯</a>
            </div>
        </div> --}}
    </div>

    <ul class="flex justify-between mt-10">
        <li>
            <a href="#" class="font-bold text-lg text-[#324DAF]">LOWONGAN LAINNYA</a>
        </li>
        <li>
            <a href="#" class="font-bold text-lg text-[#324DAF]">SELENGKAPNYA</a>

        </li>
    </ul>

    <hr class="border-t border-black mb-4">


    <div class="drop-shadow-[0_5px_2px_rgba(0,0,0,0.25)] mt-3 flex justify-center items-center gap-2">

            <div class="owl-carousel new-arrivels-carousel owl-theme">

                        @include('child')

            </div>

    </div>

    <div class="py-5">
        <img src="/images/iklan1.png" alt="iklan" class="w-full h-200">
    </div>

    {{-- @include("konten.iklan") --}}

    <div class="">
        <ul class=" ">
            <li>
                <a href="#" class="font-bold text-lg text-[#324DAF]">Rekomendasi</a>
            </li>
        </ul>

        <hr class="border-t border-black">
    </div>

    @if($nama_barang->count())
        <div class="drop-shadow-[0_5px_2px_rgba(0,0,0,0.25)] mt-3 flex justify-center items-center">
            <ul id="data-wrapper" class="grid grid-cols-4 gap-4">

                @include('child')

            </ul>
        </div>
    @else
        <p class="text-center fs-4"> NO POST FOUND</p>
    @endif

    <div class="auto-load flex justify-center mt-4" style="display: none;">
        <span class="loading loading-spinner text-primary"></span>
    </div>



    <div class="flex justify-center m-10" id="button-wrapper">
        <div class="bg-[#324DAF] px-10 py-2 rounded-full text-white">
            <ul>
                <li>
                    <a href="javascript:void(0)" id="loadMoreButton">Selengkapnya</a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('.new-arrivels-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots: false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        });
    });
</script>
@endsection




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var page = 1;
        $("#loadMoreButton").click(function() {
            page++;
            loadMoreData(page);
        });
    });

    function loadMoreData(page) {
        $.ajax({
                url: '?page=' + page,
                type: "get",
                beforeSend: function() {
                    $('.auto-load').show();
                    $('#button-wrapper').hide();
                }
            })
            .done(function(data) {
                if (data.html == " ") {
                    $('.auto-load').html("No records!");
                    return;
                }
                $('.auto-load').hide();
                $('#button-wrapper').show();
                $("#data-wrapper").append(data.html);
            })
    }
</script>
