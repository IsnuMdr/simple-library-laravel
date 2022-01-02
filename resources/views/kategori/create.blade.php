@extends('layouts.main')

@section('title', 'Tambah Kategori')

@section('container')

<div class="container mt-4">
    <div class="jumbotron">
        <h1 class="display-6">Tambah Kategori Buku</h1>
        <hr class="my-4">
        <form action="/kategori" method="POST">
            @csrf
            <div class="form-group my-4">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori"
                    value="{{ old('nama_kategori') }}">
                @if ($errors->has('nama_kategori'))
                    <span class="text-danger">{{ $errors->first('nama_kategori') }}</span>
                @endif
            </div>
            <button type="submit my-4" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection
