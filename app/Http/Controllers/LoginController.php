<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // login
    public function login() {
        return view('login');
    }

    public function loginproses(Request $request){

        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($request->only('email','password'))) {
            return redirect('/');
        }

        return redirect('login');

    }

    // daftar

    public function daftar() {
        return view('daftar');
    }

    public function daftarbaru(Request $request) {


        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);


       User::create([

        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'remember_token' => Str::random(60),


       ]);

       return redirect('/login');

    }

    // keluar

    public function logout() {
        Auth::logout();
        return redirect('login');
    }
}
