<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    //
    public function index(){
        return view ('petugas.index');
    }
    public function tabproduk()
    {
        $data['diskon']=Diskon::all();
        return view('petugas.produk',$data);
    }
    public function create()
    {
        $data['petugas'] = User::where('level','petugas')->get();
        return view ('petugas.create',$data);
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
            'email'=>'email',
            'password'=>'required',
            'level'=>'required'
        ]);
        $data['password']=bcrypt($request->password);
        User::create($data);
        return back();
    }
}
