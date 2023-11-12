@extends('dashboard.layouts.main')

@section('container')


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Data</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/editdata/{{$barang->id}}" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" 
                    id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" autofocus>
                    @error('nama_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug Barang</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                    id="slug" name="slug" value="{{ old('slug', $barang->slug) }}">
                    @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="category_id">
                        @foreach ($categories as $category)
                        @if(old('category_id', $barang->category_id) == $category->id)
                        <option value=" {{ $category->id }} " selected>{{ $category->name }}</option>
                        @else
                        <option value=" {{ $category->id }} ">{{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Foto Barang</label>
                    <input type="hidden" name="oldImage" value="{{ $barang->image }}">
                    @if($barang->image)
                    <img src="{{ asset('storage/' . $barang->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @endif
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('image') is-invalid @enderror" 
                    type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Barang</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" 
                    id="harga" name="harga" value="{{ old('harga', $barang->harga) }}">
                    @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok Barang</label>
                    <input type="text" class="form-control @error('stok') is-invalid @enderror" 
                    id="stok" name="stok" value="{{ old('stok', $barang->stok) }}">
                    @error('stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan Barang</label>
                    <textarea type="text-area" class="form-control @error('keterangan') is-invalid @enderror" 
                    id="keterangan" name="keterangan">{{ old('keterangan', $barang->keterangan) }}</textarea>
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                 
                <button type="submit" class="btn btn-primary">Edit Data</button>
        </form>
    </div>

    <script>
        const nama_barang = document.querySelector('#nama_barang');
        const slug = document.querySelector('#slug');

        nama_barang.addEventListener('change', function(){
            fetch('/dashboard/post/checkSlug?nama_barang=' +nama_barang.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
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
    </script>

@endsection