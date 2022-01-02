@extends('layouts.main')

@section('title', 'Kategori Buku')

@section('container')

<div class="container my-4">
    <div class="jumbotron">
        @if(session('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('msg')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h1 class="display-6">Data Peminjaman Buku</h1>
        <hr class="my-4">
        <a href="transaksi/create" class="btn btn-primary mb-1">
            Peminjaman Buku</a>
        <!-- <a href="buku/kembali" class="btn btn-primary mb-1">Pengembalian Buku</a>        -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Kembali</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $trans)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $trans->buku->judul_buku }}</td>
                    <td>{{ $trans->anggota->nama_anggota }}</td>
                    <td>{{ $trans->tgl_pinjam }}</td>
                    <td>{{ $trans->tgl_kembali }}</td>
                    <td>
                        @if($trans->tgl_kembali == null)
                            <a href="transaksi/edit/{{ $trans->id }}" class="badge bg-primary text-white text-decoration-none">Pengembalian</a>
                        @else
                            <p class="badge bg-success">Dikembalikan</p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
