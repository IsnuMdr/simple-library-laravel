@extends('layouts.main')

@section('title', 'Tambah Anggota')

@section('container')

<div class="container mt-4">
    <div class="jumbotron">
        <h1 class="display-6">Tambah Data Anggota</h1>
        <hr class="my-4">
        <form action="/anggota" method="POST">
            @csrf
            <div class="form-group my-3">
                <label for="nama">Nama Anggota</label>
                <input type="text" class="form-control" id="nama" name="nama_anggota" placeholder="Nama Anggota" value="{{ old('nama_anggota') }}">
                @if ($errors->has('nama_anggota'))
                    <span class="text-danger">{{ $errors->first('nama_anggota') }}</span>
                @endif
            </div>
            <div class="form-group my-3">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option selected>Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                @if ($errors->has('jenis_kelamin'))
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                @endif
            </div>
            <div class="form-group my-3">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Anggota" value="{{ old('alamat') }}">
                @if ($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
            </div>
            <div class="form-group my-3">
                <label for="email">Alamat Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group my-3">
                <label for="no_telp">No. HP</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No. HP"
                    value="{{ old('no_telp') }}">
                @if ($errors->has('no_telp'))
                    <span class="text-danger">{{ $errors->first('no_telp') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary my-3">Simpan</button>
        </form>
    </div>
</div>


@endsection
