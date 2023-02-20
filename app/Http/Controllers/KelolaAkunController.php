<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\LevelUser;
use App\Models\User;


class KelolaAkunController extends Controller
{
    public function index(Request $request)
    {
        $usr = DB::select('select * from user');
        // dd($usr);
        $search = $request->search;
        $level_user = LevelUser::select()->get();
        $user = User::select(['user.nama', 'user.username', 'level_user.nama_level', 'user.foto', 'user.id_user', 'user.level'])
            ->join('level_user', 'user.level', '=', 'level_user.id_level')
            ->where('nama', 'LIKE', '%' . $search . '%')
            ->orWhere('nama_level', 'LIKE', '%' . $search . '%')
            ->orWhere('username', 'LIKE', '%' . $search . '%')
            ->paginate(10);
        return view('SuperAdmin.index', compact('user', 'level_user', 'usr'));
    }

    // tambah
    public function store(Request $request)
    {

        request()->validate(
            [
                'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:500',
                'nama' => 'required|regex:/^[\pL\s\-]+$/u|max:60',
                'username' => 'required|alpha_num:ascii|lowercase|max:20|unique:user,username',
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
        // $usr = User::selec('*')->get();
        $user = User::whereIdUser($id)->first();
        return response()->json([
            'user' => $user,
        ]);
        // return ('user');
    }

    // update
    public function update(Request $request)
    {
        request()->validate(
            [
                'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:500',
                'nama_e' => 'required|regex:/^[\pL\s\-]+$/u|max:60|min:5',
                'username_e' => 'required|alpha_num:ascii|lowercase|max:20|min:5'
            ],
            [

                'nama_e.required' => 'nama tidak boleh kosong!',
                'nama_e.required' => 'nama tidak boleh kosong!',
                'username_e.required' => 'Username tidak boleh kosong!',
                'username_e.alpha_num' => 'Username hanya dapat mengandung huruf dan angka tanpa spasi.',
                'username_e.lowercase' => 'Username harus menggunakan huruf kecil!.',
                'username_e.max' => 'Username maksimal 20 karakter.',
                'username_e.min' => 'Username minimal 5 karakter.',
            ]
        );

        $usr_id = $request->input('user_id');
        $usr = User::find($usr_id);
        $usr->nama = $request->input('nama_e');
        $user = User::firstWhere('id_user', '=', $request->input('user_id'));
        // dd($user);
        $usr->username = $request->input('username_e');
        if ($request->input('username_e') !== $user->username) {

            $request->validate(
                [
                    'username_e' => 'unique:user,username',
                ],
                [
                    'username_e.unique' => 'Username sudah tersedia',
                ]
            );
        }
        $usr->level = $request->input('id_level');
        if ($request->hasFile('foto')) {
            $destination = 'storage/post-images/' . $usr->foto;
            if (file::exists($destination)) {
                file::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('storage/post-images/', $filename);
            $usr->foto = $filename;
        }

        if ($usr->update()) {
            return back()->with('success', "Data Berhasil di Edit");
        } else {
            return back()->alert()->error('warning', "Data Berhasil di Edit");
        }

        // ->withErrors('warning', "Data Gagal di Edit");
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
            return redirect()->back()
                ->with('warning', 'Super Admin tidak dapat dihapus!');
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
