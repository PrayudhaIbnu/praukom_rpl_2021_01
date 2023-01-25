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

                    'id_level' => '1',
                    'nama_level' => 'Super Admin',
                ],
                [
                    'id_level' => '2',
                    'nama_level' => 'Admin',
                ],
                [
                    'id_level' => '3',
                    'nama_level' => 'Kasir',
                ],
                [
                    'id_level' => '4',
                    'nama_level' => 'Pengawas',
                ],
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
