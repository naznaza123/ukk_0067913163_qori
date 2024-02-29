<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class AuthController extends Controller
{
    //
    public function index(){
        return view ('login');
    }
    public function login(Request $request){
        $request->validate([
            'akun'=>'required',
            'pass'=>'required'
        ]);

        if(Auth::attempt([
            'name'=>$request->akun,
            'password'=>$request->pass,
        ]) or Auth::attempt([
            'email'=>$request->akun,
            'password'=>$request->pass
        ])){
            if(Auth::user()->level=='admin'){
                Alert::success('Berhasil','kamu login sebagai admin');
                return redirect ('admindashboard');
            }
            if(Auth::user()->level=='petugas'){
                Alert::success('Berhasil','kamu login sebagai Petugas');
                return redirect ('petugas');
            }
        }else{
            Alert::error('error','Maaf,Login gagal');
            return redirect()->back();
        }
    }
    public function logout (){
        Auth::logout();
        Alert::success('Berhasil','Logout');
        return redirect('');
    }
}
