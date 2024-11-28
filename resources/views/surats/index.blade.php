@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-5">
        <h1>Arsip Surat</h1>
        <form method="GET" action="{{ route('surats.index') }}" class="d-flex mb-3">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari surat..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Waktu Pengarsipan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($surats as $surat)
                    <tr>
                        <td>{{ $surat->nomor_surat }}</td>
                        <td>{{ $surat->kategori }}</td>
                        <td>{{ $surat->judul }}</td>
                        <td>{{ $surat->waktu_pengarsipan }}</td>
                        <td>
                            <form action="{{ route('surats.destroy', $surat) }}" method="POST" style="display:inline;" onsubmit="confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <a href="{{ route('surats.download', $surat) }}" class="btn btn-warning btn-sm">Unduh</a>
                            <a href="{{ route('surats.show', $surat) }}" class="btn btn-primary btn-sm">Lihat &gt;&gt;</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data surat</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('surats.create') }}" class="btn btn-success">Arsipkan Surat..</a>
    </div>
    <!-- Tambahkan JavaScript -->
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            if (confirm("Apakah Anda yakin ingin menghapus arsip surat ini?")) {
                event.target.submit();
            }
        }
    </script>
@endsection
