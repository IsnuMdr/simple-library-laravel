<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'table_buku';
    protected $guarded = ['id'];
    protected $fillable = [
        'judul_buku',
        'deskripsi',
        'id_kategori',
        'cover_img'
    ];

    public function category()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    // public function transaksi()
    // {
    //     return $this->hasMany(Transaksi::class, 'id_buku');
    // }
}
