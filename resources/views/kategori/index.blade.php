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
        <h1 class="display-6">Kategori Buku</h1>
        <hr class="my-4">
        <a href="kategori/create" class="btn btn-primary mb-1">
            Tambah Kategori Buku</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $kat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kat->nama_kategori }}</td>
                    <td>
                        <a href="kategori/edit/{{ $kat->id }}" class="text-decoration-none badge bg-primary">Edit</a>
                        <a href="kategori/delete/{{ $kat->id }}" class="text-decoration-none badge bg-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
