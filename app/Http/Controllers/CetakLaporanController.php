<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\transaksi_pembayaran;
use PDF;

class CetakLaporanController extends Controller
{
    public function cetak(){
        $transaksi = transaksi_pembayaran::all();
        $pdf = PDF::loadview('dashboard.viewpdf', ['transaksi' => $transaksi])->setpaper('A4', 'landscape');
        return $pdf->stream('Laporan_transaksi');
    }
}
