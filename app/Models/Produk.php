<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'nama_produk',
        'gambar_produk',
        'harga',
        'stok',
        'tanggal_kadaluarsa',
        'id_kategori',
        'id_diskon',
        'diskon'
    ];
    static function tambah_produk($nama_produk,$harga){
        Produk::create([
            'nama_produk'=>$nama_produk,
            'harga'=>$harga
        ]);
    }
    static function detail_produk($id)
    {
        $data=Produk::where('id',$id)->first();

        return $data;
    }

    // protected $primaryKey='id';
}
