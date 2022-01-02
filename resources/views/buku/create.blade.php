@extends('layouts.main')

@section('title', 'Tambah Buku')

@section('container')

<div class="container my-4">
    <div class="jumbotron">
        <h1 class="display-6">Tambah Buku</h1>
        <hr class="my-4">
        <form action="store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group my-4">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" class="form-control" name="judul_buku" placeholder="Judul Buku"
                    value="{{ old('judul_buku') }}">
                @if ($errors->has('judul_buku'))
                    <span class="text-danger">{{ $errors->first('judul_buku') }}</span>
                @endif
            </div>
            <div class="form-group my-4">
                <label for="deskripsi">Deskripsi Buku</label>
                <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi Buku"
                    value="{{ old('deskripsi') }}">
                    @if ($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
            </div>
            <div class="form-group my-4">
                <label for="id_kategori">Kategori Buku</label>
                <select class="form-control" id="id_kategori" name="id_kategori">
                    <option value="" selected>Pilih Kategori</option>
                    @foreach ($kategori as $kat)
                    <option value="{{ $kat->id }}">
                        {{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
                @if ($errors->has('id_kategori'))
                    <span class="text-danger">{{ $errors->first('id_kategori') }}</span>
                @endif
            </div>
            <div class="form-group my-4">
                <label for="cover_img">Cover Buku</label>
                <input type="file" name="cover_img">
                @if ($errors->has('cover_img'))
                    <span class="text-danger">{{ $errors->first('cover_img') }}</span>
                @endif
            </div>
            <button type="submit my-4" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>


@endsection
