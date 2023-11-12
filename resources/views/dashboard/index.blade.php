@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
    </div>


    <div class="row">
      <div class="col-md-6">
        <form action="/dashboard">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." name="cari">
            <button class="btn btn-primary" type="submit">Search</button>
          </div>
        </form>
      </div>
    </div>

    <div class="table-responsive col-lg-8">
      <a href="/dashboard/create">
      <button class="btn btn-primary">
        Tambah Data
      </button>
      </a>
            <table class="table table-striped table-sm mt-2">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Stok</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($detailBarang as $barang)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $barang->nama_barang }}</td>
                  <td>RP-,{{ number_format($barang->harga) }}</td>
                  <td>{{ $barang->stok }}</td>
                  <td>
                    <!-- <a href="/dashboard/{{ $barang->id }}" class="badge bg-info"><span data-feather="eye"></span></a> -->
                    <a href="/tampiledit/{{ $barang->id }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <a href="/hapus/{{ $barang->id }}" class="badge bg-danger"><span data-feather="x-circle"></span></a>
                  </td>
                </tr>
                @endforeach
               </tbody>
            </table>
          </div>
@endsection