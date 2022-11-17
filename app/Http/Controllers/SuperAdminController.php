<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    public function index()
    {
        // $user = SuperAdmin::all();
        $level_user = DB::table('level_user')->select()->get();
        $user = DB::table('user')
            ->select(['user.nama', 'user.username', 'level_user.nama_level', 'user.foto'])
            ->join('level_user', 'user.level', '=', 'level_user.id_level')
            ->get();
        // dd($user);
        // $level_user = DB::table('level_user')->select()->get();
        return view('SuperAdmin.index', compact('user', 'level_user'));
    }

    public function tambah(Request $request)
    {
        $user = new User;
        $id_user = substr(md5(rand(0, 99999)), -4);
        $user['id_user'] = $id_user;
        $user->nama = $request->input('nama');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->foto = $request->file('foto')->store('post-images');
        $user->level = $request->input('id_level');
        $user->save();
        return redirect()->back()->with('success', "Data berhasi di tambah");
    }

    public function edit($id = null)
    { {
        }
    }
}
