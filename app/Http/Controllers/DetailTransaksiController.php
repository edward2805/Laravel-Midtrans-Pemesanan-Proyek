<?php

namespace App\Http\Controllers;

use App\Models\DetailBarang;
use Illuminate\Http\Request;
use App\Models\transaksi_pembayaran;
use PDF;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        // dd(request('search'));
        
        $transaksi = transaksi_pembayaran::latest();

        if(request('search')){
            $transaksi->where('name', 'like', '%' .request('search') . '%')
                      ->orWhere('status', 'like', '%' .request('search') . '%');
        }

        return view ('dashboard.detail', [
            "transaksi" => $transaksi->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaksi_pembayaran  $detailBarang
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi_pembayaran $Transaksi_pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaksi_pembayaran  $detailBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(transaksi_pembayaran $Transaksi_pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaksi_pembayaran  $detailBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaksi_pembayaran $Transaksi_pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi_pembayaran  $detailBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaksi_pembayaran $Transaksi_pembayaran)
    {
        //
    }

    // public function cetakpdf(){
    //     $transaksi = transaksi_pembayaran::all();
    //     $pdf = PDF::loadview('dashboard.viewpdf', ['transaksi' => $transaksi]);
    //     return $pdf->download('Laporan_transaksi');
    // }

}
