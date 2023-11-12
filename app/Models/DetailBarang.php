<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class DetailBarang extends Model
{
    use HasFactory;
    use Sluggable;


    // protected $fillable = ['nama_barang', 'harga', 'stok', 'keterangan'];

    protected $guarded = ['id'];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_barang'
            ]
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function pesanan_detail(){
        return $this->hasMany('App\Models\PesananDetail', 'barang_id', 'id');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
