<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $beritas = [

            [
                'title' => 'Inisiatif Transformasi Digital: Menyiapkan Siswa untuk Industri 4.0',
                'category' => 'Unggulan',
                'tanggal' => '2024-10-24',
                'image' => 'news-hero-featured.jpg',
                'excerpt' => 'SMK Negeri 4 terus mendorong transformasi digital untuk menjembatani pendidikan vokasi dengan kebutuhan industri terkini.',
                'content' => 'SMK Negeri 4 Bogor terus mendorong transformasi digital melalui berbagai kegiatan pembelajaran dan pengembangan kompetensi siswa. Inisiatif ini bertujuan mempersiapkan siswa agar mampu mengikuti perkembangan teknologi dan kebutuhan dunia industri.',
            ],

            [
                'title' => 'Kompetisi Sains Nasional: SMKN 4 Raih Juara Pertama',
                'category' => 'Prestasi',
                'tanggal' => '2024-10-22',
                'image' => 'news-article-1.jpg',
                'excerpt' => 'Siswa SMK Negeri 4 Bogor menunjukkan kemampuan dan inovasi dalam kompetisi sains tingkat nasional.',
                'content' => 'Siswa SMK Negeri 4 Bogor berhasil menunjukkan kemampuan dan inovasi dalam kompetisi sains tingkat nasional. Prestasi tersebut menjadi motivasi bagi siswa lainnya untuk terus mengembangkan kemampuan akademik dan keterampilan.',
            ],

            [
                'title' => 'Festival Olahraga Tahunan 2024: Semangat Keunggulan',
                'category' => 'Kegiatan',
                'tanggal' => '2024-10-20',
                'image' => 'news-article-2.jpg',
                'excerpt' => 'Festival olahraga tahunan menjadi salah satu kegiatan yang mempererat kebersamaan dan semangat kompetisi siswa.',
                'content' => 'Festival olahraga tahunan SMK Negeri 4 Bogor berlangsung dengan semangat kebersamaan. Berbagai cabang olahraga diikuti oleh siswa sebagai bagian dari kegiatan pengembangan minat, bakat, dan kerja sama tim.',
            ],

            [
                'title' => 'Kemitraan Baru dengan Toyota Astra Motor',
                'category' => 'Pengumuman',
                'tanggal' => '2024-10-18',
                'image' => 'news-article-3.jpg',
                'excerpt' => 'Kerja sama dengan dunia industri menjadi bagian dari upaya meningkatkan keterampilan siswa sesuai kebutuhan industri.',
                'content' => 'SMK Negeri 4 Bogor terus mengembangkan hubungan dengan dunia industri melalui berbagai bentuk kerja sama. Kemitraan ini diharapkan dapat memberikan pengalaman dan wawasan yang relevan bagi siswa, khususnya dalam bidang otomotif.',
            ],

            [
                'title' => 'Tim Robotika Juara Kompetisi Regional',
                'category' => 'Prestasi',
                'tanggal' => '2024-10-15',
                'image' => 'news-article-4.jpg',
                'excerpt' => 'Tim robotika SMK Negeri 4 Bogor berhasil meraih prestasi dalam kompetisi tingkat regional.',
                'content' => 'Tim robotika SMK Negeri 4 Bogor berhasil meraih prestasi dalam kompetisi tingkat regional. Keberhasilan tersebut menjadi hasil dari proses latihan, kerja sama tim, dan pengembangan kemampuan siswa.',
            ],

            [
                'title' => 'Perpustakaan Direvitalisasi: Kini Terbuka untuk Riset',
                'category' => 'Pengumuman',
                'tanggal' => '2024-10-12',
                'image' => 'news-article-5.jpg',
                'excerpt' => 'Perpustakaan sekolah terus dikembangkan sebagai ruang belajar dan sumber informasi bagi siswa.',
                'content' => 'Perpustakaan SMK Negeri 4 Bogor terus dikembangkan untuk mendukung kegiatan belajar siswa. Pembaruan fasilitas diharapkan dapat membuat perpustakaan semakin nyaman digunakan untuk membaca, belajar, dan melakukan riset.',
            ],

            [
                'title' => 'Sorotan Alumni: Perjalanan Menuju Google Cloud',
                'category' => 'Prestasi',
                'tanggal' => '2024-10-10',
                'image' => 'news-article-6.jpg',
                'excerpt' => 'Kisah alumni menjadi salah satu sumber inspirasi bagi siswa dalam merencanakan perjalanan pendidikan dan karier.',
                'content' => 'Perjalanan alumni menjadi salah satu bagian yang dapat memberikan inspirasi kepada siswa. Pengalaman setelah lulus dapat menjadi gambaran mengenai berbagai kesempatan pendidikan dan karier yang dapat ditempuh.',
            ],

            [
                'title' => 'Workshop Kreativitas dan Inovasi Siswa',
                'category' => 'Kegiatan',
                'tanggal' => '2024-10-08',
                'image' => 'news-article-1.jpg',
                'excerpt' => 'Siswa mengikuti workshop yang mendorong kreativitas, kolaborasi, dan kemampuan menghasilkan ide baru.',
                'content' => 'Workshop kreativitas dan inovasi menjadi salah satu kegiatan pengembangan potensi siswa. Melalui kegiatan ini, siswa diajak untuk bekerja sama, menyampaikan ide, dan mengembangkan solusi kreatif.',
            ],

            [
                'title' => 'Persiapan Siswa Menghadapi Dunia Kerja dan Industri',
                'category' => 'Pengumuman',
                'tanggal' => '2024-10-05',
                'image' => 'news-article-2.jpg',
                'excerpt' => 'Sekolah terus mempersiapkan siswa melalui penguatan kompetensi dan wawasan mengenai dunia kerja.',
                'content' => 'Persiapan menghadapi dunia kerja menjadi bagian penting dalam pendidikan vokasi. Sekolah terus memberikan pembekalan kepada siswa melalui pengembangan kompetensi, kedisiplinan, dan wawasan mengenai kebutuhan dunia industri.',
            ],

        ];

        foreach ($beritas as $berita) {
            $berita['slug'] = Str::slug($berita['title']);

            Berita::updateOrCreate(
                ['title' => $berita['title']],
                $berita
            );
        }
    }
}