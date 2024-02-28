<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable=[
        // 'id_kategori_produk',
        'nama_kategori'
    ];
    protected $primaryKey= 'id_kategori_produk';
    // protected $primaryKey = [
    //     'id_kategori_produk'
    // ];
}
