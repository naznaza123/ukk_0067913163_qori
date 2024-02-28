<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use App\Models\Produk;
use Illuminate\Http\Request;
use Alert;
use App\Models\Kategori;
use PhpParser\Node\Stmt\Return_;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class ProdukController extends Controller
{
    //
    public function cetak_pdf()
    {
     $pegawai = Pegawai::all();
 
     $pdf = PDF::loadview('pegawai_pdf',['pegawai'=>$pegawai]);
     return $pdf->download('laporan-pegawai-pdf');
    }
    public function index(){
        $diskon=Diskon::all();
        $produk=Produk::all();
        $kateg=Kategori::all();
        $data=[
            'produk'=>$produk,
            'diskon'=>$diskon,
            'kateg'=>$kateg
        ];
        return view ('admin.produk',$data);
    }
    public function store (Request $request){
        $data=$request->validate([
            'nama_produk'=>'required',
            'gambar_produk'=>'mimes:png,jpg',
            'harga'=>'required',
            'stok'=>'required',
            'tanggal_kadaluarsa'=>'required',
            'id_kategori'=>'required',
            'id_diskon'=>'required',

        ]);
        $harga=$request->harga;
        $diskon=Diskon::where('id',$request->id_diskon)->first();
        if($diskon->jenis_diskon=="%"){
            $jumlahdiskon=($diskon->nilai_diskon / 100)*$harga;
            $data['diskon']=$harga -= $jumlahdiskon;
        } else if($diskon->jenis_diskon=='RP'){
            $data['diskon'] = $harga - $diskon->nilai_diskon;
        } else {
             Alert::error('Diskon salah','Diskon tidak ditemukan');
            return redirect()->back();
        }


        if($request->file('gambar_produk')){
            $file=$request->file('gambar_produk');
            $filename=$file->hashName();
            $file->move(public_path('image'),$filename);

            $data['gambar_produk']=$filename;
        }
        Produk::create($data);
        Alert::success('sip','produk sudah ditambahkan');

        Return redirect('produk');
    }
    public function delete($id){
        $produk=Produk::find($id);
        $produk->delete();

        return redirect()->back();
    }
    public function edit($id){
        $data['produk']=Produk::find($id);
        return view ('admin.edit-produk',$data);
    }
    public function update(Request $request){
        $data=$request->validate([
            'nama_produk'=>'required',
            'gambar_produk'=>'mimes:png,jpg',
            'harga'=>'required',
            'stok'=>'required',
            'tanggal_kadaluarsa'=>'required',
            'id_kategori'=>'required',
            'id_diskon'=>'required',

        ]);
        if($request->file('gambar_produk')){
            $file=$request->file('gambar_produk');
            $filename=$file->hashName();
            $file->move(public_path('image'),$filename);

            $data['gambar_produk']=$filename;
        }
        Produk::where('id',$request->id)->update($data);
        return redirect('produk');
    }
}
