<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index', ['title' => 'Home']);
});

Route::group([],function () {
    Route::resource('anggota',AnggotaController::class);
    Route::get('anggota/edit/{id}', [AnggotaController::class, 'edit']);
    Route::post('anggota/update/{id}', [AnggotaController::class, 'update']);
    Route::get('anggota/delete/{id}', [AnggotaController::class, 'destroy']);
});

Route::group([],function () {
    Route::resource('kategori',KategoriController::class);
    Route::get('kategori/edit/{id}', [KategoriController::class, 'edit']);
    Route::post('kategori/update/{id}', [KategoriController::class, 'update']);
    Route::get('kategori/delete/{id}', [KategoriController::class, 'destroy']);
});

Route::group([],function () {
    Route::resource('buku',BukuController::class);
    Route::post('buku/store', [BukuController::class, 'store']);
    Route::get('buku/edit/{id}', [BukuController::class, 'edit']);
    Route::post('buku/update/{id}', [BukuController::class, 'update']);
    Route::get('buku/delete/{id}', [BukuController::class, 'destroy']);
});

Route::group([],function () {
    Route::resource('transaksi',TransaksiController::class);
    Route::get('transaksi/edit/{id}', [TransaksiController::class, 'edit']);
    Route::post('transaksi/update/{id}', [TransaksiController::class, 'update']);
});
