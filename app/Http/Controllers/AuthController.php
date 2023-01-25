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
            // dd($credentials);
            $user = Auth::user();
            Session::put('levelbaru', Auth::user());
            // dd(Session::all());

            if ($user->level === '1') {
                return redirect()->intended('superadmin/kelolaakun');
            } elseif ($user->level === '2') {
                return redirect()->intended('admin/dashboard');
            } elseif ($user->level === '3') {
                return redirect()->intended('kasir/transaksi');
            } elseif ($user->level === '4') {
                return redirect()->intended('pengawas/dashboard');
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
