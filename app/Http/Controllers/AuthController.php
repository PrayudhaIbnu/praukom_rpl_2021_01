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
            $user = Auth::user()->level_user->nama_level;
            // Session::put('levelbaru', Auth::user());
            switch ($user) {
                case 'Super Admin':
                    return to_route('kelolaakun');
                    break;
                case 'Admin':
                    return to_route('dashboard');
                    break;
                case 'Kasir':
                    return to_route('transaksi');
                    break;
                case 'Pengawas':
                    return to_route('dashboard');
                    break;
            }
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
