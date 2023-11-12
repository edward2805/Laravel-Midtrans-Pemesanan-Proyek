<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailBarang;

class BarangController extends Controller
{
    public function index(){
        return view('home',[
            "title" => "Home",
            "active" => "Home",
            "barangs" => DetailBarang::latest()->paginate(4)
        ]);
    }

    public function tampil(DetailBarang $Barang){
        return view ('barang', [
            "title" => "single Post",
            "active" => "Home",
            "Barang" => $Barang
        ]);
    }
}
