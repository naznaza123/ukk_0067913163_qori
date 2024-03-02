<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Diskon extends Model
{
    use HasFactory;
    protected $fillable=[
        'nama_diskon',
    'jenis_diskon',
        'nilai_diskon',
        'deskripsi',
        'berlaku_mulai',
        'berlaku_selesai'

    ];
    public function detailDiskon()
    {
        return $this->hasMany(Produk::class);
    }

    public function isExpired()
    {
        return Carbon::now()->gt(Carbon::parse($this->berlaku_selesai));
    }

}
