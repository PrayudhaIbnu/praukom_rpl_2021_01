<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('level_user')->insert(
            [
                [

                    'id_level' => 'L01',
                    'nama_level' => 'Super Admin',
                ],
                [
                    'id_level' => 'L02',
                    'nama_level' => 'Admin',
                ],
                [
                    'id_level' => 'L03',
                    'nama_level' => 'Kasir',
                ],
                [
                    'id_level' => 'L04',
                    'nama_level' => 'Pengawas',
                ],
            ]
        );

        DB::table('users')->insert(
            [
                'id_user' => 'USR01',
                'nama' => 'Super Admin',
                'username' => 'superadmin',
                'password' => '$2a$04$8CdTgc9ElPOyBsRLqEzG7.IbKssuQOqvcRd68cD0O7YrSvow70j8W', // onemartjaya
                'level' => 'L01',

            ]
        );

        DB::table('produk_kategori')->insert(
            [
                [
                    'kategori_produk' => 'Makanan',
                ],
                [
                    'kategori_produk' => 'Minuman',
                ]
            ]
        );
    }
}
