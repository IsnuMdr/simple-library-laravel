@extends('layouts.main')

@section('title', 'MDR Library')
@section('container')

<div class="p-5 bg-light rounded-3">
    <div class="container">
        <h1 class="display-5 fw-bold">Selamat Datang!</h1>
        <p class="col-md-8 fs-4">Ini adalah Sistem Informasi Perpustakaan sederhana dengan Laravel 8</p>
        <a href="/buku" class="btn btn-primary btn-lg" type="button">Lihat Buku</a>
    </div>
</div>


@endsection
