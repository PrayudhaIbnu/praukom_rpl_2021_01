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
            ]
        ]);
        $users->each(fn ($user) => User::create($user));
    }
}
