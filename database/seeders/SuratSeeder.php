<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surat;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Surat::create([
            'nomor_surat' => '2022/PD3/TU/001',
            'kategori' => 'Pengumuman',
            'judul' => 'Nota Dinas WFH',
            'waktu_pengarsipan' => now(),
            'file_path' => 'files/nota_dinas_wfh.pdf',
        ]);

        Surat::create([
            'nomor_surat' => '2022/PD2/TU/002',
            'kategori' => 'Undangan',
            'judul' => 'Undangan Halal Bi Halal',
            'waktu_pengarsipan' => now(),
            'file_path' => 'files/undangan_halal_bi_halal.pdf',
        ]);
    }
}
