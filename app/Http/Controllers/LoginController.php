<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request){
         $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
         ]);

         if(Auth::attempt($credential)){
             $request->session()->regenerate();
             Alert::success('Login Berhasil', 'Selamat Datang!'.' '. Auth::user()->name);
             return redirect()->intended('/dashboard');
         }

        Alert::error('Login gagal', 'email atau password salah!');
        return back();
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
