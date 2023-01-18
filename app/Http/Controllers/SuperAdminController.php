<?php

namespace App\Http\Controllers;

use App\Models\User;
use Darryldecode\Cart\Validators\Validator;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index(Request $request)

    {
        // $user = user::all();
        $search = $request->search;
        $level_user = DB::table('level_user')->select()->get();
        $user = DB::table('user')
            ->select(['user.nama', 'user.username', 'level_user.nama_level', 'user.foto', 'user.id_user', 'user.level'])
            ->join('level_user', 'user.level', '=', 'level_user.id_level')
            ->orderBy('nama', 'ASC')
            ->where('nama', 'LIKE', '%' . $search . '%')
            ->orWhere('nama_level', 'LIKE', '%' . $search . '%')
            ->orWhere('username', 'LIKE', '%' . $search . '%')
            ->paginate(10);
        return view('SuperAdmin.index', compact('user', 'level_user'));
    }

    // tambah
    public function store(Request $request)
    {

        request()->validate(
            [
                'nama' => 'required',
                'username' => 'required|unique:user',
                'password' => 'required'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong!',
                'username.required' => 'Username tidak boleh kosong!',
                'username.unique' => 'Username sudah tersedia.',
                'password.required' => 'Password tidak boleh kosong!',
            ]
        );


        $user = new User;
        $id_user = collect(DB::select('SELECT new_iduser() AS new_iduser'))->first()->new_iduser;
        $user['id_user'] = $id_user;
        $user->nama = $request->input('nama');
        $user->username =  $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->level = $request->input('id_level');
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('storage/post-images/', $filename);
            $user->foto = $filename;
        }
        $user->save();
        return redirect()->back()->with('success', "Data Berhasil di Tambah");
    }

    // edit
    public function edit($id)
    {
        $user = User::whereIdUser($id)->first();
        return response()->json([
            'user' => $user,
        ]);
    }

    // update
    public function update(Request $request)
    {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $user->nama = $request->input('nama');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->level = $request->input('id_level');
        if ($request->hasFile('foto')) {
            $destination = 'storage/post-images/' . $user->foto;
            if (file::exists($destination)) {
                file::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('storage/post-images/', $filename);
            $user->foto = $filename;
        }
        $user->update();
        return redirect()->back()->with('success', "Data Berhasil di Edit");
    }

    // hapus
    public function destroy(Request $request)
    {
        $user_id = $request->input('delete_user_id');
        $user = User::find($user_id);
        $destination = 'storage/post-images/' . $user->foto;
        if (file::exists($destination)) {
            file::delete($destination);
        }
        $user->delete();
        return redirect()->back()->with('success', "Data Berhasil di Hapus");
    }

    // search
    // public function search(Request $request)
    // {
    //     $get_name = $request->search;
    //     $user = user::where('nama', 'LIKE', '%' . $get_name, '%')->get();
    //     return view('SuperAdmin.index', compact('user'));
    // }
}
