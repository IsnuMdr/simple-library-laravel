<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'nama_kategori' => 'Ilmu Komputer'
        ]);

        Kategori::create([
            'nama_kategori' => 'Pemrograman Web'
        ]);

        Kategori::create([
            'nama_kategori' => 'Desain Grafis'
        ]);
    }
}
