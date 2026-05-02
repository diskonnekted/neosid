<?php
namespace App\Console\Commands;

use App\Models\Artikel;
use Illuminate\Console\Command;

class AddDummyArticlesCommand extends Command
{
    protected $signature = 'opensid:add-dummy-articles';
    protected $description = 'Creates gorgeous fallback dummy articles for testing the Fresh theme.';

    public function handle()
    {
        $this->info('Starting to create articles...');
        $articles = [
            [
                'judul' => 'Peresmian Balai Desa Baru untuk Peningkatan Layanan Warga',
                'isi' => 'Pemerintah desa meresmikan balai desa baru dengan fasilitas yang lebih lengkap dan ramah disabilitas guna mempermudah pelayanan masyarakat.',
                'gambar' => 'dummy1.jpg'
            ],
            [
                'judul' => 'Program Posyandu Balita dan Lansia Serentak Bulan Ini',
                'isi' => 'Pelayanan kesehatan bagi warga desa terus digalakkan melalui posyandu balita dan lansia secara rutin di seluruh RW.',
                'gambar' => 'dummy2.jpg'
            ],
            [
                'judul' => 'Pengembangan UMKM Desa Melalui Digital Marketing',
                'isi' => 'Pelaku UMKM di desa diberikan pelatihan pemanfaatan e-commerce dan sosial media untuk memperluas jangkauan pasar produk lokal.',
                'gambar' => 'dummy3.jpg'
            ],
            [
                'judul' => 'Panen Raya Padi Organik Desa Mencapai Rekor Baru',
                'isi' => 'Hasil panen padi organik kelompok tani mandiri berhasil melampaui target tahun lalu berkat pendampingan dinas pertanian.',
                'gambar' => 'dummy1.jpg'
            ],
            [
                'judul' => 'Kegiatan Kerja Bakti Massal Menjelang Musim Hujan',
                'isi' => 'Warga desa bergotong royong membersihkan saluran air dan fasilitas umum guna mencegah terjadinya banjir.',
                'gambar' => 'dummy2.jpg'
            ],
            [
                'judul' => 'Bantuan Langsung Tunai (BLT) DD Disalurkan Tepat Sasaran',
                'isi' => 'Pemerintah desa menyalurkan BLT Dana Desa tahap akhir kepada puluhan KPM yang berhak menerimanya.',
                'gambar' => 'dummy3.jpg'
            ]
        ];

        foreach ($articles as $art) {
            Artikel::create([
                'judul' => $art['judul'],
                'isi' => $art['isi'],
                'id_kategori' => 1,
                'gambar' => $art['gambar'],
                'id_user' => 1,
                'enabled' => 1,
                'tgl_upload' => now(),
                'slider' => 0,
                'headline' => 0
            ]);
        }

        $this->info('Successfully created ' . count($articles) . ' articles.');
    }
}
