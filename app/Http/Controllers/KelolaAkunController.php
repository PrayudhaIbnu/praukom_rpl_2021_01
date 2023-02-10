<?php

namespace App\Http\Controllers;

use App\Models\User;
use Darryldecode\Cart\Validators\Validator;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class KelolaAkunController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $level_user = DB::table('level_user')->select()->get();
        $user = DB::table('user')
            ->select(['user.nama', 'user.username', 'level_user.nama_level', 'user.foto', 'user.id_user', 'user.level'])
            ->join('level_user', 'user.level', '=', 'level_user.id_level')
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
                'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1000',
                'nama' => 'required|regex:/^[\pL\s\-]+$/u|max:60',
                'username' => 'required|unique:user|alpha_num:ascii|lowercase|max:20',
                'password' => ['required', Password::min(8)]
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong!',
                'nama.regex' => 'Nama hanya dapat mengandung huruf.',
                'nama.max' => 'Nama tidak dapat melebihi 60 huruf.',
                'username.required' => 'Username tidak boleh kosong!',
                'username.unique' => 'Username sudah tersedia.',
                'username.alpha_num' => 'Username hanya dapat mengandung huruf dan angka tanpa spasi.',
                'username.lowercase' => 'Username harus menggunakan huruf kecil!.',
                'username.max' => 'Username maksimal 20 karakter.',
                'password.required' => 'Password tidak boleh kosong!',
                'password.min' => 'Password minimal 8 karakter',
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
    public function edit($id = null)
    {
        $user = User::whereIdUser($id)->first();
        return response()->json([
            'user' => $user,
        ]);
    }

    // update
    public function update(Request $request)
    {
        request()->validate(
            [
                'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1000',
                'nama' => 'required|regex:/^[\pL\s\-]+$/u|max:60',
                'username' => 'required|alpha_num:ascii|lowercase|max:20',
            ],
            [

                'nama.required' => 'Nama tidak boleh kosong!',
                'nama.regex' => 'Nama hanya dapat mengandung huruf.',
                'nama.max' => 'Nama tidak dapat melebihi 60 huruf.',
                'username.required' => 'Username tidak boleh kosong!',
                'username.alpha_num' => 'Username hanya dapat mengandung huruf dan angka tanpa spasi.',
                'username.lowercase' => 'Username harus menggunakan huruf kecil!.',
                'username.max' => 'Username maksimal 20 karakter.',
            ]
        );

        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $user->nama = $request->input('nama');
        $user->username = $request->input('username');
        // $user->password = Hash::make($request->input('password'));
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

    public function updatePassword(Request $request)
    {
        request()->validate(
            [
                'password' => 'required|min:8'
            ],
            [
                'password.required' => 'Password tidak boleh kosong!',
                'password.min' => 'Password minimal 8 karakter!',
                // 'password.numbers' => 'Password minimal terdapat 1 angkat!'
            ]
        );

        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $user->password = Hash::make($request->input('password'));
        $user->update();
        return redirect()->back()->with('success', "Password Berhasil di Edit");
    }

    // hapus
    public function destroy(Request $request)
    {

        $user_id = $request->input('delete_user_id');
        if ($user_id == 'USR01') {
            return redirect()->back()->with('warning', 'Super Admin tidak dapat dihapus!');
        } else {
            # code...
            $user = User::find($user_id);
            $destination = 'storage/post-images/' . $user->foto;
            if (file::exists($destination)) {
                file::delete($destination);
            }
            $user->delete();
            return redirect()->back()->with('success', "Data Berhasil di Hapus");
        }
    }
}
