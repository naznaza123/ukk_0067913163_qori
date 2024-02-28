<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Alert;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class DiskonController extends Controller
{
    //
    public function index (){
        $diskon=Diskon::all();
        $data=[
            'diskon'=>$diskon
        ];
        return view ('diskon.index',$data);
    }
    public function create(Request $request){
        $data=$request->validate([
            'nama_diskon'=>'required',
            'jenis_diskon'=>'required',
            'nilai_diskon'=>'required',
            'deskripsi'=>'required',
            'berlaku_mulai'=>'required',
            'berlaku_selesai'=>'required'
        ]);
        Diskon::create($data);
        Alert::success('Sip','Diskon Berhasil Dibuat');
        return redirect()->back();
    }
}