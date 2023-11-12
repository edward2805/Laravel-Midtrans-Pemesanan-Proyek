

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
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <h3><i class="bi bi-cart-fill"></i> Check Out</h3>
                    @if(!empty($pesanan))
                    <p align="right">Tanggal Pemesanan : {{ $pesanan->tanggal }}</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                @foreach($pesanan_details as $pesanan_detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                    <td>{{ $pesanan_detail->jumlah }}</td>
                                    <td>RP-, {{ number_format($pesanan_detail->barang->harga) }}</td>
                                    <td>RP-, {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                    <td>
                                        <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick=" return confirm (' Apakah Anda Yakin akan menghapus pesanan ini ?? ');">
                                            <i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" align="right"><strong>Total Harga :</strong></td>
                                    <td><strong>RP-, {{ number_format($pesanan->jumlah_harga) }} </strong></td>
                                    <td>
                                        <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success btn-sm"
                                        onclick=" return confirm (' Apakah Anda Yakin akan melakukan Check Out pesanan ini ?? ');">
                                        <i class="bi bi-cart-fill"></i> Check Out
                                        </a>
                                    </td>
                                    <!-- <td>
                                        <a href="{{ url('ongkir') }}" class="btn btn-success btn-sm">
                                        <i class="bi bi-cart-fill"></i> ongkir
                                        </a>
                                    </td> -->
                                </tr>
                            </tbody>
                        </table>  
                        @endif    
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection