<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Kavist\RajaOngkir\RajaOngkir;


class TambahOngkir extends Component
{
    public $pesanan_details;
    private $apiKey = 'a7c903b0a1a5248a6276bd278deefdac'; 
    public $provinsi_id, $kota_id, $jasa, $daftarProvinsi, $daftarKota;

    public function mount($id)
    {
        if (!Auth::user())
        {
            return redirect('login');
        }
        $this->pesanan_details = PesananDetail::find($id);
    }
    public function render()
    {
        $rajaOngkir = new RajaOngkir($this->apiKey);
        $this->daftarProvinsi = $rajaOngkir->provinsi()->all();
        // dd($this->daftarProvinsi);

        return view('livewire.tambah-ongkir')->extends('layouts.main')->section('container');
    }
}
