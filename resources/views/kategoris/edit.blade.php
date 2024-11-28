@extends('layouts.app')

@section('content')
    <div class="container mt-5 text-dark">
        <h1>Edit Kategori</h1>
        <form action="{{ route('kategoris.update', $kategori) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
            </div>
            <div class="mb-3">
                <label>Keterangan</label>
                <textarea type="text" name="keterangan" class="form-control" required rows="3"> {{ $kategori->keterangan }} </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
