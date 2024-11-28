<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        //Query data surat
        $query = Surat::query();

        //Filter pencarian berdasarkan judul surat
        if ($request->has('search') && $request->search !== null) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        //Ambil semua data yang sesuai dengan filter
        $surats = $query->get();

        //Mengembalikan view dengan data
        return view('surats.index', compact('surats'));
    }

    public function create()
    {
        $categories = ['Undangan', 'Pengumuman', 'Nota Dinas', 'Pemberitahuan'];
        return view('surats.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'kategori' => 'required',
            'judul' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = $request->nomor_surat . '-' . $file->getClientOriginalName();
        $filePath = $file->move('files', $fileName);

        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'waktu_pengarsipan' => now(),
            'file_path' => $filePath,
        ]);

        return redirect()->route('surats.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit(Surat $surat)
    {
        $categories = ['Undangan', 'Pengumuman', 'Nota Dinas', 'Pemberitahuan'];
        return view('surats.edit', compact('surat', 'categories'));
    }

    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'kategori' => 'required',
            'judul' => 'required',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->only(['nomor_surat', 'kategori', 'judul']);
        if ($request->hasFile('file')) {
            if (File::exists($surat->file_path)) {
                File::delete($surat->file_path);
                $file = $request->file('file');
                $fileName = $request->nomor_surat . '-' . $file->getClientOriginalName();
                $filePath = $file->move('files', $fileName);
            } else {
                $file = $request->file('file');
                $fileName = $request->nomor_surat . '-' . $file->getClientOriginalName();
                $filePath = $file->move('files', $fileName);
            }
        }

        $surat->update([
            'nomor_surat' => $request->nomor_surat,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'file_path' => isset($filePath) ? $filePath : $surat->file_path,
        ]);

        return redirect()->route('surats.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Surat $surat)
    {
        // Hapus file dari storage
        if (File::exists($surat->file_path)) {
            File::delete($surat->file_path);
        }

        // Hapus data dari database
        $surat->delete();

        return redirect()->route('surats.index')->with('success', 'Surat berhasil dihapus');
    }

    public function download(Surat $surat)
    {
        return response()->download(public_path($surat->file_path), $surat->nomor_surat . '-' . $surat->judul . '.pdf');
    }

    public function show(Surat $surat)
    {
        return view('surats.show', compact('surat'));
    }
}
