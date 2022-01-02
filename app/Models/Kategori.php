<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'table_kategori';
    protected $fillable = ['nama_kategori'];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'id');
    }

    // public function transaksi()
    // {
    //     return $this->hasMany(Transaksi::class, 'id_kategori');
    // }
}
