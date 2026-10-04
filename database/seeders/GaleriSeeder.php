<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        // 16 foto Kegiatan Siswa
        for ($i = 1; $i <= 16; $i++) {
            Galeri::create([
                'judul' => 'Kegiatan Siswa ' . $i,
                'kategori' => 'kegiatan',
                'gambar' => 'galery-' . $i . '.JPG',
            ]);
        }

        // 16 foto Prestasi
        for ($i = 1; $i <= 16; $i++) {
            Galeri::create([
                'judul' => 'Prestasi Siswa ' . $i,
                'kategori' => 'prestasi',
                'gambar' => 'prestasi-' . $i . '.JPG',
            ]);
        }
    }
}