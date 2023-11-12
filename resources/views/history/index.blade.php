@extends('layouts.main')
@section('container')

    <!--body-->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-d3KFumzg5tau0DVW"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-1">
                <a href="/" class="btn btn-primary"><i class="bi bi-arrow-left"></i>Kembali</a>
            </div>
            <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="bi bi-clock-history"></i> Riwayat Pemesanan</h3> 
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Harga</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($pesanans as $pesanan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pesanan->tanggal }}</td>
                                    <td>RP-, {{ number_format($pesanan->jumlah_harga) }} </td>
                                    <td>
                                        @if($pesanan->status == 1)
                                        <a href="{{ url('bayar') }}/{{ $pesanan->id }}">
                                        <button name="bayar" id="bayar" type="button" 
                                                class="btn btn-primary center-block">
                                                Bayar Sekarang
                                        </button>
                                        </a>
                                        @endif
                                        @if($pesanan->status == 2)
                                        <a href="{{ url('status') }}/{{ $pesanan->id }}">
                                        <button name="status" id="status" type="button" 
                                                class="btn btn-primary center-block">
                                                Status Pembayaran
                                        </button>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection