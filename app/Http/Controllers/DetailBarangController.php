<?php

namespace App\Http\Controllers;

use App\Models\DetailBarang;
use Illuminate\Http\Request;

class DetailBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detbarang = DetailBarang::latest();

        if(request('cari')){
            $detbarang->where('nama_barang', 'like', '%' .request('cari') . '%')
                   ->orWhere('harga', 'like', '%' .request('cari') . '%');
        }

        return view('home',[
            "title" => "Home",
            "active" => "Home",
            "barangs" => $detbarang->paginate(4)
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
     * @param  \App\Models\DetailBarang  $detailBarang
     * @return \Illuminate\Http\Response
     */
    public function show(DetailBarang $detailBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailBarang  $detailBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailBarang $detailBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailBarang  $detailBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailBarang $detailBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailBarang  $detailBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailBarang $detailBarang)
    {
        //
    }
}
