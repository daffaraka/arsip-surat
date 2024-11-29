<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Surat</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Detail Surat</h1>
        <p><strong>Nomor Surat:</strong> {{ $surat->nomor_surat }}</p>
        <p><strong>Kategori:</strong> {{ $surat->kategori }}</p>
        <p><strong>Judul:</strong> {{ $surat->judul }}</p>
        <p><strong>Waktu Pengarsipan:</strong> {{ $surat->waktu_pengarsipan }}</p>
        <iframe src="{{ asset($surat->file_path) }}" width="100%" height="600px" type="application/pdf"> </iframe>
        <div class="mt-5">
            <a href="{{ route('surats.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('surats.download', $surat) }}" class="btn btn-warning">Unduh</a>
            <a href="{{ route('surats.edit', $surat) }}" class="btn btn-primary">Edit/Ganti File</a>

        </div>

    </div>
</body>
</html>
