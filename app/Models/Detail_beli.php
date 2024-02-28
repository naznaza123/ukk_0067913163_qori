<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_beli extends Model
{
    use HasFactory;
    protected $fillable=[
        'jumlah',
        'harga',
        'pembelian_id',
        'produk_id'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
