<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable=[
        'tanggal_jual',
        'metode_pembayaran'
    ];
    
    public function detailTransaksis()
    {
        return $this->hasMany(Detail_Transaksi::class);
    }
}
