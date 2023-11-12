@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Pemesanan</h1>
    </div>

    <div class="row">
      <div class="col-md-4">
        <form action="/dahsboard/detail">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." name="search">
            <button class="btn btn-primary" type="submit">Search</button>
          </div>
        </form>
      </div>
    </div>
    <div class="table-responsive col-lg-12">
        <a href="/dashboard/detail/cetakpdf">
          <button class="btn btn-primary">
            Cetak Laporan
          </button>
          </a>
            <table class="table table-striped table-sm mt-2">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Pemesan</th>
                  <th scope="col">Email Pemesan</th>
                  <th scope="col">ID Pemesan</th>
                  <th scope="col">Total Harga</th>
                  <th scope="col">Pembayaran via</th>
                  <th scope="col">Bank Pembayaran</th>
                  <th scope="col">Tanggal Pembayaran</th>
                  <th scope="col">Status Pembayaran</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transaksi as $t)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $t->name }}</td>
                  <td>{{ $t->email }}</td>
                  <td>{{ $t->order_id }}</td>
                  <td>RP-,{{ number_format($t->gross_amount) }}</td>
                  <td>{{ $t->payment_type }}</td>
                  <td>{{ $t->bank }}</td>
                  <td>{{ $t->transaction_time }}</td>
                  <td>{{ $t->status }}</td>
                </tr>
                
                @endforeach
               </tbody>
            </table>
            {{ $transaksi->links() }}
          </div>

@endsection