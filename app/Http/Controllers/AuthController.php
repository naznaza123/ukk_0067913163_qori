<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                return redirect ('admindashboard');
            }
            if(Auth::user()->level=='petugas'){
                return redirect ('petugas');
            }
        }else{
            return redirect()->back();
        }
    }
    public function logout (){
        Auth::logout();
        return redirect('');
    }
}
