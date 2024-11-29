@extends('layouts.app')

@section('content')
    <div class="container mt-5 text-dark">
        <h1>Edit Surat</h1>

        <form action="{{ route('surats.update', $surat) }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="text-dark">Nomor Surat</label>
                <input type="text" name="nomor_surat" class="form-control"
                    value="{{ old('nomor_surat', $surat->nomor_surat) }}" required>
            </div>
            <div class="mb-3">
                <label class="text-dark">Kategori</label>
                <select name="kategori" class="form-select" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}"
                            {{ old('kategori', $surat->kategori) === $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="text-dark">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $surat->judul) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="file_path" class="form-label">Upload File (PDF):</label>
                <input type="file" name="file_path" id="file_path" accept="application/pdf" class="form-control">
                <p class="mt-5">File saat ini: <a href="{{ asset($surat->file_path) }}" target="_blank">Lihat file</a></p>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('surats.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>

    </div>
@endsection
