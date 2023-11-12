

@extends('layouts.main')
@section('container')

    <!--body-->
    <div class="container">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/h1.jpg" class="d-block" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="img/h2.jpeg" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="img/h3.png" class="d-block w-100" alt="..." />
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <div class="container text-justify bg-white">
      <div class="row">
        <!--artikel-->
        <div class="col-lg-9 col-md-12 py-5 ">
          <h2 style="text-align: center" class="text-white bg-primary">PROJECT</h2>
          <div class="row text-white">
          <form action="/DetHome">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search..." name="cari">
              <button class="btn btn-primary" type="submit">Search</button>
            </div>
          </form>
          @foreach ($barangs as $barang)
            <div class="card text-black me-1 mb-3" style="width: 30rem; height: 33rem;">
                @if($barang->image)
                <div style="max-height: 550px; overflow:hidden;">
                <img src="{{ asset('storage/' . $barang->image) }}" alt="{{ $barang->category->nama_barang  }}" 
                class="card-img-top"/>
                </div>          
                @endif
                <div class="card-body text-justify">
                  <h5 class="card-title"><a class="text-decoration-none" href="/barang/{{ $barang->slug }}">{{ $barang->nama_barang }}</a></h5>
                  <p class="card-text">
                    <strong>Harga : </strong> RP-,{{ number_format($barang->harga) }} <br>
                    <strong>Stock : </strong> {{ $barang->stok }} <br>
                  </p>
                  Category : <a class="text-decoration-none "href="/kategori/{{ $barang->category->slug }}">{{ $barang->category->name }}</a><br><br>
                  <a href="/pesan/{{ $barang->id }}" class="btn btn-primary"> <i class="bi bi-cart"></i> Pesan</a>
                </div>
              </div>
              @endforeach
          </div>
          {{ $barangs->links() }}
        </div>

        <div class="col-lg-3 col-md-6 py-5 mt-1">
          <ul class="list-group">
            <li class="list-group-item active" aria-current="true">Menu Utama</li>
            <a style="text-decoration: none" href="/"><li class="list-group-item">Beranda</li></a>
            <a style="text-decoration: none" href="/about"><li class="list-group-item">Tentang Kami</li></a>
          </ul>
        </div>
      </div>
    </div>

    @endsection