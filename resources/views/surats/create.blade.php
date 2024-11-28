@extends('layouts.app')

@section('content')
    <div class="container mt-5 text-dark">
        <h1>Tambah Surat</h1>
        <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
            <strong>Catatan:</strong> Gunakan file berformat PDF.
        </p>
        <form action="{{ route('surats.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="text-dark">Nomor Surat</label>
                <input type="text" name="nomor_surat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="text-dark">Kategori</label>
                <select name="kategori" class="form-select" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="text-dark">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="text-dark">File Surat (PDF)</label>
                <input type="file" name="file" class="form-control" accept="application/pdf" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('surats.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
