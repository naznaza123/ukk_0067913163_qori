<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function index()
    {
        $data['kateg']=Kategori::all();
        return view ('kategori.index',$data);
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'nama_kategori'=>'required'
        ]);
        Kategori::create($data);
        return back();
    }
    public function edit($id_kategori_produk)
    {
        $data['kat']=Kategori::find($id_kategori_produk)->first();
        return view ('kategori.edit',$data);
    }
    public function update(Request $request)
    {
        $data=$request->validate([
            'nama_kategori'=>'required'
        ]);
        Kategori::where('id_kategori_produk',$request->id_kategori_produk)->update($data);
        return redirect('kategori');
    }
    
}
