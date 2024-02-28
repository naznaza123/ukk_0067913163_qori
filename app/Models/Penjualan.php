<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $fillable=[
        'tanggal_jual',

    ];
    static function tambah_transaksi(){
        $data=Penjualan::create([
            'tanggal_jual'=>date('y-m-d'),
        ]);
        return $data->id;
    }
}
