

@extends('layouts.main')
@section('container')

    <!--body-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-1">
                <a href="/" class="btn btn-primary"><i class="bi bi-arrow-left"></i>Kembali</a>
            </div>
            <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $Barang->nama_barang }}</li>
                </ol>
                </nav>
            </div>
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-6">
                            <h2>{{ $Barang->nama_barang }}</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga Barang</td>
                                        <td>:</td>
                                        <td>RP. {{ number_format($Barang->harga) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stock Barang</td>
                                        <td>:</td>
                                        <td>{{ number_format($Barang->stok) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan Barang</td>
                                        <td>:</td>
                                        <td>{!! $Barang->keterangan !!}</td>
                                    </tr>
                                    
                                        <tr>
                                            <td>Jumlah Pesanan Barang</td>
                                            <td>:</td>
                                            <td>
                                                <form action="{{ url('pesan') }}/{{ $Barang->id }}" method="post">
                                                    @csrf
                                                    <input type="text" name="jumlah_pesan" class="form-control" required>
                                                    <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-cart"></i> Masukkan Ke Keranjang</button>
                                                </form>
                                            </td>
                                        </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection