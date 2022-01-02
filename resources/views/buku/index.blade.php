@extends('layouts.main')

@section('title', 'Buku')

@section('container')

<div class="container my-4">
    <div class="jumbotron">
        @if(session('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('msg')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h1 class="display-6">Daftar Buku</h1>
        <hr class="my-4">
        <a href="buku/create" class="btn btn-primary mb-1">Tambah Buku</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Deskripsi Buku</th>
                    <th scope="col">Kategori Buku</th>
                    <th scope="col">Cover Buku</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $buku)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td width="20%">{{ $buku->judul_buku }}</td>
                    <td>{{ Str::limit($buku->deskripsi,30) }}</td>
                    <td>{{ $buku->category->nama_kategori }}</td>
                    <td class="text-center"><img src='image/{{ $buku->cover_img }}' style="height:250px;"></td>
                    <td>
                        <a href="buku/edit/{{ $buku->id }}" class="text-decoration-none badge bg-primary">Edit</a>
                        <a href="buku/delete/{{ $buku->id }}" class="text-decoration-none badge bg-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
