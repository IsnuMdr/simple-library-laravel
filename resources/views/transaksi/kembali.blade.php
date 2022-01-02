@extends('layouts.main')

@section('title', 'Kembali Buku')

@section('container')

<div class="container my-4">
    <div class="jumbotron">
        <h1 class="display-6">Kembali Buku</h1>
        <hr class="my-4">
        <form action="/transaksi/update/{{$transaksi->id}}" method="POST">
            @csrf
            <div class="form-group my-3">
                <input type="hidden" class="form-control" name="type_transaksi" placeholder="Kembali" value="kembali" readonly="true">
            </div>
            <div class="form-group my-3">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" class="form-control" id="judul_buku" name="judul_buku"
                    value="{{ $transaksi->buku->judul_buku }}" readonly="true">
            </div>
            <div class="form-group my-3">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="kategori">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tgl_pinjam" value="{{ $transaksi->tgl_pinjam }}"
                            readonly="true">
                    </div>
                    <div class="col-sm-6">
                        <label for="kategori">Tanggal Kembali</label>
                        <input type="date" class="form-control" name="tgl_kembali" value="{{date('Y-m-d')}}">
                    </div>
                </div>
            </div>
            <div class="form-group my-3">
                <label for="nama_anggota">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" readonly="true"
                    value="{{ $transaksi->anggota->nama_anggota }}">
            </div>
            <button type="submit my-3" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection
