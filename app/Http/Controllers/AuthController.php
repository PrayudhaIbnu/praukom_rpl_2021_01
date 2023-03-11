<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function index()
    {

        return view('Auth.login');
    }

    public function masuk(Request $request)
    {

        request()->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Username tidak boleh kosong!',
                'password.required' => 'Password tidak boleh kosong!'
            ]
        );
        $credentials = $request->only(['username', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            // Session::put('levelbaru', Auth::user());
            if ($user->level === '1') {
                return redirect()->intended('kelolaakun');
            } elseif ($user->level === '2') {
                return redirect()->intended('dashboard');
            } elseif ($user->level === '3') {
                return redirect()->intended('transaksi');
            } elseif ($user->level === '4') {
                return redirect()->intended('dashboard');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Username atau Password salah!'
        ])->onlyInput('username');
    }


    public function keluar(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
