<div class="">
    <div class="drop-shadow-[0_5px_2px_rgba(0,0,0,0.25)]">
        <ul class="mb-3">
            @foreach ($berita as $brt )

            <li class="mb-3">
                <a href="">
                    <div class="bg-slate-100 w-1200 h-250  rounded-xl items-center flex drop-shadow-md ">
                        <div class=" w-1/5 ">
                            <div class="w-150 px-2">
                            <img src="{{ asset('storage/' . $brt->image) }}" alt="gambar" class="rounded-xl object-cover ">
                            </div>
                        </div>
                        <div class="w-4/5 h-200 inline-block relative">
                            <div>
                            <h1 class="font-bold text-xl pb-1">{{ $brt->title }}</h1>
                            <p>{!! Str::limit($brt->body, 600)!!}</p>
                            </div>
                            <div>
                                <a href="" class="absolute bottom-0 right-0 font-bold text-lg text-green_button">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach

        </ul>
    </div>
</div>



