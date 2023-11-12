@extends('layouts.main')

@section('container')    

    <article>
        <h1 class="mb-3">{{ $Barang->nama_barang }}</h1>
        <p>Category : <a href="/kategori/{{ $Barang->category->slug }}">{{ $Barang->category->name }}</a></p>
        <h5>RP-, {{ $Barang->harga }}</h5>
        {!! $Barang->keterangan !!}
    </article>

    <a href="/">back to Category</a>

@endsection