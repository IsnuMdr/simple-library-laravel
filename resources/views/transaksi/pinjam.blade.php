@extends('layouts.main')

@section('title', 'Pinjam Buku')

@section('container')

<div class="container my-4">
    <div class="jumbotron">
        <h1 class="display-6">Pinjam Buku</h1>
        <hr class="my-4">
        <form action="/transaksi" method="POST">
            @csrf
            <div class="form-group my-2">
                <input type="hidden" class="form-control" name="type_transaksi" placeholder="Pinjam" value="pinjam" readonly="true">
            </div>
            <div class="form-group my-2">
                <label for="id_buku">Kode Buku</label>
                <select class="form-control" id="id_buku" name="id_buku">
                    <option value="">Pilih Buku</option>
                    @foreach ($buku as $buku)
                        <option value="{{$buku->id}}">{{$buku->judul_buku}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-2">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="kategori">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tgl_pinjam" value="{{date('Y-m-d')}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="kategori">Tanggal Kembali</label>
                        <input type="date" class="form-control" name="tgl_kembali" readonly="true">
                    </div>
                </div>
            </div>
            <div class="form-group my-2">
                <label for="id_anggota">Peminjam</label>
                <select class="form-control" id="id_anggota" name="id_anggota">
                    <option value="">Pilih Anggota</option>
                    @foreach ($anggota as $anggota)
                        <option value="{{$anggota->id}}">{{$anggota->nama_anggota}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit my-2" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection
