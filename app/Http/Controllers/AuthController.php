<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == 'L01') {
                return redirect()->intended('superadmin');
            } elseif ($user->level == 'L02') {
                return redirect()->intended('admin');
            }
        }
        return view('Auth.login');
    }

    public function masuk(Request $request)
    {

        request()->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]
        );
        $credentials = $request->only(['username', 'password']);

        if (Auth::attempt($credentials)) {
            // berhasi login
            $request->session()->regenerate();
            // dd($credentials);
            $user = Auth::user();
            dd(Auth::user());
            if ($user->level == 'L01') {
                return redirect()->intended('superadmin');
            } elseif ($user->level == 'L02') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'L03') {
                return redirect()->intended('kasir');
            } else return view('Admin.dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau Password salah!'
        ])->onlyInput('username');

        // if (Auth::attempt($credentials)) {
        //     // berhasi login
        //     $request->session()->regenerate();
        //     // return redirect()->intended('supplier');
        // } else {
        //     return redirect('login')
        //         ->with('errors', 'Email atau Password salah!');
        // }
    }
    public function keluar()
    {
        Auth::logout();
        return redirect('login')->with('success', 'Anda berhasil Logout');
    }
}
