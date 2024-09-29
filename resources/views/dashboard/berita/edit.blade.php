@extends('dashboard.layout.main')

@section('container')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="">EDIT Berita</h1>
      </div>


      <div class="col-lg-8">

          <form method="post" action="/dashboard/berita/{{ $berita->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $berita->title) }}">
                @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>

              <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $berita->slug) }}">
                @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>


          <div class="mb-3">
            <label for="image" class="form-label">Foto</label>
            <input type="hidden" name="oldImage" value="{{ $berita->image }}">
            @if($berita->image)
                <img src="{{ asset('storage/'. $berita->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

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

          <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" id="body" cols="30" rows="10">{{ old('body', $berita->body) }}</textarea>
          </div>

                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
        </main>


{{-- SLUG --}}
<script>

    // ini buat gambar preview
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

  {{-- ckeditor --}}
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

  <script>
    ClassicEditor
      .create( document.querySelector( '#body' ) )
      .then( editor => {
        console.log( editor );
      })
      .catch( error => {
        console.error( error );
      });
  </script>

@endsection
