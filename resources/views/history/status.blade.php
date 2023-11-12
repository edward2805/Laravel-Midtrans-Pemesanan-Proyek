@extends('layouts.main')
@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table" style="border-top : hidden">
                        <tr>
                            <td>Nama </td>
                            <td>:</td>
                            <td> {{ $name }} </td>
                        </tr>
                        <tr>
                            <td>Virtual Akun</td>
                            <td>:</td>
                            <td> {{ $va_number }} </td>
                        </tr>
                        <tr>
                            <td>Bank Pembayaran</td>
                            <td>:</td>
                            <td>{{ $bank }} </td>
                        </tr>
                        <tr>
                            <td>Total Harga</td>
                            <td>:</td>
                            <td>{{ $gross_amount }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>{{ $status }}</td>
                        </tr>
                    </table>
                    <a href="{{ url('history') }}">
                        <button name="Kembali" id="Kembali" type="button" 
                                class="btn btn-primary center-block">
                                Kembali
                        </button>
                    </a>
                </div>
           </div>
        </div>
    </div>
</div>

@endsection