@extends("layout.main2")

@section("container")


<div class="flex justify-center items-center">
    <div  class="">
        <img src="images/SiapAda.png" alt="logo_sembako" srcset="" class="w-1200">
    </div>

    <div class="">
        <div class="">
            <h1 class="text-[#324DAF] font-bold text-24">SIAP ADA</h1>
        </div>
        <div>
            <p>Aplikasi ini berbasis Website yang memudahkan konsumen untuk mencari jasa dan membantu mitra mendapatkan pekerjaan sementara dari konsumen. Tujuan utama aplikasi ini adalah agar para pencari kerja yang belum memiliki pekerjaan, tetap dapat berpartisipasi dalam perputaran ekonomi di Indonesia, dengan harapan dapat mengurangi tingkat kemiskinan, pengangguran serta kriminalitas.</p>

        </div>
    </div>
</div>


<div class="my-20">
    <div class="flex justify-center items-center">
        <h1 class="text-[#324DAF] font-bold text-30">MISI KAMI</h1>
    </div>


    <div class="flex justify-center items-center gap-5 my-10">
        @for ($i=1; $i<=3; $i++)


        <div class="putih drop-shadow-[0_5px_2px_rgba(0,0,0,0.25)] bg-white w-270 h-450 inline-block">
                <div class="isi flex justify-center items-center flex-col ">
                <div class="bg-slate-400 w-200 h-200 my-3">

                </div>
                <div>
                    <h1 class="flex justify-center items-center text-[#324DAF] text-24">TEGAR</h1>
                    <p class="text-justify p-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit eveniet laboriosam tenetur, explicabo aliquam provident minima amet quaerat quod consectetur.</p>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>





@endsection
