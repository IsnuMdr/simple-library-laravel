<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Seeder;

class AnggotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Anggota::create([
            'nama_anggota' => 'Muhammad Isnu Munandar',
            'jenis_kelamin'=> 'Laki-laki',
            'alamat'=> 'Panggung, Kota Tegal',
            'email'=> 'isnu.mdr@gmail.com',
            'no_telp' => '082326139613'
        ]);
        Anggota::create([
            'nama_anggota' => 'M. Rizki Apriyan Wijaya',
            'jenis_kelamin'=> 'Laki-laki',
            'alamat'=> 'Lebaksiu, Tegal',
            'email'=> 'lord.kt@gmail.com',
            'no_telp' => '082426149614'
        ]);
    }
}
