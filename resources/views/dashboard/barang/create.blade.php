@extends('dashboard.layout.main')

@section('container')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="">BARANGKU</h1>
      </div>


      <div class="col-lg-8">

          <form method="post" action="/dashboard/barang" enctype="multipart/form-data">
            @csrf
              <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                  @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>


              <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
                @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}">
                @error('harga')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Jumlah Tenaga</label>
                <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok') }}">
                @error('stok')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi') }}">
                @error('lokasi')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>


            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
              @foreach ($categories as $category)
                  @if(old('category_id') == $category->id)
                  <option value="{{ $category->id }}" selected>{{ $category->nama }}</option>
                  @else
                  <option value="{{ $category->id }}">{{ $category->nama }}</option>
                  @endif

              @endforeach
          </select>
          </div>

          <div class="mb-3">
              <label for="user_id" class="form-label">Pilih Penjual</label>
              <select class="form-select" name="user_id" id="user_id_select">
            @foreach ($user as $usr)
                @if(old('user_id') == $usr->id)
                <option value="{{ $usr->id }}" selected>{{ $usr->name }}</option>
                @else
                <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                @endif

            @endforeach
        </select>
        <input type="hidden" name="selected_user_id" id="selected_user_id">

        </div>
        
          <div class="mb-3">
            <label for="image" class="form-label">Image Utama</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>


            <div class="mb-3">
                <label for="body" class="form-label" >Keterangan</label>

                <textarea name="body" id="body" cols="30" rows="10"></textarea>

            </div>





                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
        </main>




{{-- SLUG --}}
<script>
    const nama = document.querySelector("#nama");
const slug = document.querySelector("#slug");

const userSelect = document.getElementById('user_id_select');
    const selectedUserIdInput = document.getElementById('selected_user_id');

nama.addEventListener("keyup", function() {
    let preslug = nama.value;
    preslug = preslug.replace(/ /g,"-");
    slug.value = preslug.toLowerCase();
    });

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



    userSelect.addEventListener('change', function() {
        const selectedUserId = userSelect.options[userSelect.selectedIndex].value;
        selectedUserIdInput.value = selectedUserId;
    });
</script>





{{-- ckeditr --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
            .create( document.querySelector( '#body' ),{
                allowedContent: true // Mengizinkan teks biasa tanpa format HTML
            } )

            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endsection

