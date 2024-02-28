<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Queue\Console\RetryCommand;

class PelangganController extends Controller
{
    //
    public function index()
    {
        $data['pel']=Pelanggan::all();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view ('pelanggan.index',$data);
    }
    public function store(Request $req)
    {
        $data['pel']=Pelanggan::all();
        $pelang=$req->validate([
            'nama_pelanggan'=>'required',
            'alamat'=>'required',
            'no_telepon'=>'required'
        ]);
        Pelanggan::create($pelang);
        Alert::success('sip','pelanggan sudah ditambahkan');
        // return view('cart',$data);
        return back();
        
    }
    public function edit($id)
    {
        $data['pel']=Pelanggan::find($id);
       return view ('pelanggan.edit',$data);
    }
    public function update(Request $req)
    {
        $data=$req->validate([
            'nama_pelanggan'=>'required',
            'alamat'=>'required',
            'no_telepon'=>'required'
        ]);
        Pelanggan::where('id',$req->id)->update($data);
        Alert::success('sip','pelanggan telah di update');
        return redirect('pelanggan');
    }
    public function delete($id)
    {
        $pel=Pelanggan::find($id);
        $pel->delete();
        Alert::info('Sip','Pelanggan Sudah Di Hapus');
        return redirect()->back();
    }
}
