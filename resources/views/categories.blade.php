@extends('layouts.main')

@section('container')    
    
    <h1>Halaman Categories</h1>
    @foreach ($categories as $kategori)  

    <ul>
        <li>
        <h2>
          <a href="/categories/{{ $kategori->slug }}">{{ $kategori->name }}</a>
        </h2>
        </li>
    </ul>
    @endforeach

@endsection