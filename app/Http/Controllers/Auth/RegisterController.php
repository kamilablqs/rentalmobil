<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //memanggil.from.register
    function indeX()
    {
        return view('pages.auth.register');
    }

    //memproses register data
    function register(Request $request)
    {
        //VALIDASI DATA
        $validatedUser = $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
            'contact'=>'required',
        ]);
        
        //proses login )mengecek data di form dengan yang ada di data base)
        $userData = new User;
        $userData->name = $request->name ;
        $userData->email = $request->email;
        $userData->password = bcrypt($request->password);
        $userData->contact = $request->contact;
        $userData->save();
        //redirect
        return redirect()->to('/login')->with('sukses','Registrasi Berhasil');
    }
}