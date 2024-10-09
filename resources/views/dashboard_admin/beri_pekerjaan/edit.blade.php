@extends('dashboard_admin.layout.main')

@section('container')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="">UBAH PEKERJAAN</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard_admin/beri_pekerjaan/{{ $barang->slug }}" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $barang->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $barang->slug) }}" required>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $barang->harga) }}" required>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-select" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $barang->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="oldImage" value="{{ $barang->image }}">
            @if($barang->image)
                <img src="{{ asset('storage/' . $barang->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif

            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Keterangan</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{ old('body', $barang->body) }}</textarea>
                @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Barang</button>
        </form>
    </div>
</main>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#body'), {
            allowedContent: true // Mengizinkan teks biasa tanpa format HTML
        })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection
