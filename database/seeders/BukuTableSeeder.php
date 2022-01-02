<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;

class BukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tambah Buku
        Buku::create([
            'judul_buku' => 'Aplikasi Komputer',
            'deskripsi' => 'Buku Aplikasi Komputer diterbitkan oleh Deepublish dan membahas sejarah generasi komputer hingga rangkaian Microsoft, mulai dari Excel hingga Microsoft Access.',
            'id_kategori' => 1,
            'cover_img' => 'aplikasi-komputer.jpg'
        ]);
        Buku::create([
            'judul_buku' => 'The Pragmatic Programmer: Your Journey to Mastery',
            'deskripsi' => 'The Pragmatic Programmer merupakan salah satu buku programmer paling terkenal di dunia.',
            'id_kategori' => 2,
            'cover_img' => 'the-pragmatic-programmer.jpg'
        ]);
        Buku::create([
            'judul_buku' => 'HTML and CSS: Design and Build Websites',
            'deskripsi' => 'Membaca buku belajar coding itu kadang membosankan karena penuh dengan penjelasan dan kode-kode.',
            'id_kategori' => 2,
            'cover_img' => 'html-css.jpg'
        ]);
        Buku::create([
            'judul_buku' => 'Making and Breaking the Grid',
            'deskripsi' => 'Buku ini dapat memberikan kamu lebih banyak gambaran tentang grid dan penggunaannya bagi desainer grafis.',
            'id_kategori' => 3,
            'cover_img' => 'making-grid.jpg'
        ]);
    }
}
