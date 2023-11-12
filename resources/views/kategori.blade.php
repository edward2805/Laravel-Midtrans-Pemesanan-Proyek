@extends('layouts.main')

@section('container')    
    
    <h1>Halaman kategori : {{ $category }}</h1>
    @foreach ($barangs as $barang)  

    
      <article class="mb-5">
        <h2>
          <a href="/barang/{{ $barang->slug }}">{{ $barang->nama_barang }}</a>
        </h2>
        <h5>RP-, {{ $barang->harga }}</h5>
      </article>
    @endforeach

@endsection