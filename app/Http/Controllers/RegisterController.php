<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;



class RegisterController extends Controller
{
    function index() {
        return view("register");
    }
    function register(Request $request) {
        $request->validate([
            'name'=> 'required',
            'password'=> 'required',
            'email'=> 'required|email|unique:users',
            'phone'=> 'required|min:6',
        ], [
            'name.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'phone.required' => 'No Handphone Wajib Diisi',
        ]);

        $data = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'phone' => $request->phone,
        ];
        User::create($data);

        $inforegister = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (($inforegister)) {
            return redirect('/login')->with('success' . 'Berhasil membuat akun!');
        }else {
            return redirect('/register')->withErrors('Gagal membuat akun!');
        }
    }
}
