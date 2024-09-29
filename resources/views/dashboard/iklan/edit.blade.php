@extends('dashboard.layout.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="">EDIT POST</h1>
  </div>


  <div class="col-lg-8">
    

      <form method="post" action="/dashboard/iklan/{{ $iklan->id }}" enctype="multipart/form-data">
        {{-- enctype="multipart/form-data" agar bisa menangani file --}}
        @method('put')
        @csrf
          <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $iklan->nama) }}">
              @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
          </div>

        <div class="mb-3">
            <label for="image" class="form-label">Post Iklan</label>
            <input type="hidden" name="oldImage" value="{{ $iklan->image }}">
            @if($iklan->image)
                <img src="{{ asset('storage/'. $iklan->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
    </main>

    <script>

function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
}
    </script>




{{-- ckeditr --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    @endsection
