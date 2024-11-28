@extends('layouts.app')

@section('content')
<div class="container mt-5 text-dark">
    <h1>Kategori Surat</h1>
    <a href="{{ route('kategoris.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kategori)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>{{ $kategori->keterangan }}</td>

                    <td>
                        <a href="{{ route('kategoris.edit', $kategori) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kategoris.destroy', $kategori) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
