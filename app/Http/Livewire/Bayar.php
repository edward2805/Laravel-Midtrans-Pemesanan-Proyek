<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pesanan;
use Auth;


class Bayar extends Component
{
    public $snapToken;
    public $pesanan;


    public function mount($id){
        if(!Auth::user()){
            return redirect()->route('login');
        }
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-WrsrdmI5DQdQnbr-Lh1Hji_O';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        // ambil data pesanan

        $this->pesanan = Pesanan::find($id);

        if(!empty($this->pesanan)){
            $params = array(
                'transaction_details' => array(
                    'order_id' => $this->id,
                    'gross_amount' => $this->pesanan->jumlah_harga,
                ),
                'customer_details' => array(
                    'first_name' => 'Saudara...',
                    'last_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'phone' => Auth::user()->nohp,
                ),
            );
            $this->snapToken = \Midtrans\Snap::getSnapToken($params);
        }
    }

    public function render()
    {
        return view('livewire.bayar')->extends('livewire.main')->section('container');
    }
}
