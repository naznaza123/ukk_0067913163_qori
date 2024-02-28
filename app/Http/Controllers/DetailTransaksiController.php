<?php

namespace App\Http\Controllers;

use App\Models\Detail_Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    //
    public function create(Request $request){
        $dt=DetailTransaksi::create();
        $idt=$dt->id;

        // $data=[
        //     'jumlah_produk'=>$request->jumlah,
        //     ''
        // ]
        
        return redirect()->back();
    }
}
