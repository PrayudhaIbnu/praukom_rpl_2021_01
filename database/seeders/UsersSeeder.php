<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = collect([
            [
                'id_user' => 'USR01',
                'nama' => 'Super Admin',
                'username' => 'superadmin',
                'password' => Hash::make('superadmin'),
                'foto' => '',
                'level' => '1',
            ],
            [
                'id_user' => 'USR02',
                'nama' => 'Mulki Rahman',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'foto' => '',
                'level' => '2',
            ],
            [
                'id_user' => 'USR03',
                'nama' => 'Fahmi Kurnia',
                'username' => 'kasir',
                'password' => Hash::make('kasir'),
                'foto' => '',
                'level' => '3',
            ],
            [
                'id_user' => 'USR04',
                'nama' => 'Ibnu Pryudha',
                'username' => 'pengawas',
                'password' => Hash::make('pengawas'),
                'foto' => '',
                'level' => '4',
            ]
        ]);
        $users->each(fn ($user) => User::create($user));
    }
}
