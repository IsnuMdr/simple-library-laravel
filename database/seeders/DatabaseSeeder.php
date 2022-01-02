<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BukuTableSeeder;
use Database\Seeders\AnggotaTableSeeder;
use Database\Seeders\KategoriTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AnggotaTableSeeder::class,
            KategoriTableSeeder::class,
            BukuTableSeeder::class,
        ]);
    }
}
