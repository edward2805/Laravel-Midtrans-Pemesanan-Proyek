<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class transaksi_pembayaran extends Model
{
    protected $guarded = ['id'];

    public function user(){
        return $this->hasMany('App\Models\User','user_id','id');
    }

    // public function allData(){
    //     return DB::table('transaksi_pembayaran')
    //     ->leftJoin('pesanan', 'pesanan.id', '=', 'transaksi_pembayaran.order_id')
    //     ->get();
    // }
}
