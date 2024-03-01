<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $fillable=[
        'tanggal_beli',
        'metode_pembayaran'
    ];
    public function detailBeli()
    {
        return $this->hasMany(Detail_beli::class);
    }
}
