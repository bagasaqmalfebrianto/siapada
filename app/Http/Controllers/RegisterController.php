<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            'title'=>'Register'
        ]);
    }

    public function store(Request $request){
        $validasiData = $request->validate([
            'name'=> 'required|max:255',
            'username'=>['required','min:3','max:255','unique:users'],
            //bisa pakai array
            'email'=>'required|email:dns|unique:users',
            'is_pencari_kerja'=>'required',
            'password'=>'required|min:5|max:255'
        ]);

        User::create($validasiData);

        return redirect('/login')->with('success', 'REGISTRASI BERHASIL');

    }
}
