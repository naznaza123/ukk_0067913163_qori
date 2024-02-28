<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailJual extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_penjualan',
        'id_produk',
        'jumlah'
    ];

    static function tambah_detail_transaksi($id_produk,$id_penjualan,$jumlah)
    {
        DetailJual::create([
            'id_produk'=>$id_produk,
            'id_penjualan'=>$id_penjualan,
            'jumlah'=>$jumlah
        ]);
    }
}
