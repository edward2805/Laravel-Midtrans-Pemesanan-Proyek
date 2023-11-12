<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    public function barang(){
        return $this->belongsTo('App\Models\DetailBarang', 'barang_id', 'id');
    }

    public function pesanan(){
        return $this->hasMany('App\Models\PesananDetail', 'pesanan_id', 'id');
    }

    public function transaksi(){
        return $this->belongsTo('App\Models\TransaksiPembayaran', 'order_id', 'id');
    }

    protected $guarded = ['id'];
}
