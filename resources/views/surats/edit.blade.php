@extends('layouts.app')

@section('content')
    <h1>Edit Surat</h1>

    <form action="{{ route('surats.update', $surat) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nomor Surat -->
        <div>
            <label for="nomor_surat">Nomor Surat:</label>
            <input type="text" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}" required>
        </div>

        <!-- Kategori -->
        <div>
            <label for="kategori">Kategori:</label>
            <select name="kategori" id="kategori" required>
                <option value="Pengumuman" {{ old('kategori', $surat->kategori) === 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                <option value="Undangan" {{ old('kategori', $surat->kategori) === 'Undangan' ? 'selected' : '' }}>Undangan</option>
                <option value="Nota Dinas" {{ old('kategori', $surat->kategori) === 'Nota Dinas' ? 'selected' : '' }}>Nota Dinas</option>
                <option value="Pemberitahuan" {{ old('kategori', $surat->kategori) === 'Pemberitahuan' ? 'selected' : '' }}>Pemberitahuan</option>
            </select>
        </div>

        <!-- Judul -->
        <div>
            <label for="judul">Judul Surat:</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $surat->judul) }}" required>
        </div>

        <!-- File PDF -->
        <div>
            <label for="file_path">Upload File (PDF):</label>
            <input type="file" name="file_path" id="file_path" accept="application/pdf">
            <p>File saat ini: <a href="{{ asset($surat->file_path) }}" target="_blank">Lihat file</a></p>
        </div>

        <!-- Tombol -->
        <div>
            <button type="submit">Simpan Perubahan</button>
            <a href="{{ route('surats.index') }}">Batal</a>
        </div>
    </form>
@endsection
