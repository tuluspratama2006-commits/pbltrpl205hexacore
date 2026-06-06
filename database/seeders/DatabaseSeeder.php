<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $layanans = [
            [
                'judul_layanan' => 'Kontruksi Gedung',
                'slug'          => 'kontruksi-gedung',
                'deskripsi'     => 'Penyediaan jasa kontruksi untuk berbagai jenis gedung komersial maupun fasilitas publik lainnya dengan mengutamakan fungsionalitas ruang dan kekuatan struktur bangunan',
                'icon'          => '(BG009)',
                'gambar'        => null,
                'urutan'        => 1,
                'status'        => 'publish',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'judul_layanan' => 'Pekerjaan Bangunan Sipil Sumber Daya Air',
                'slug'          => 'pekerjaan-bangunan-sipil-sumber-daya-air',
                'deskripsi'     => 'Kami melayani jasa pelaksana untuk kontruksi jaringan saluran air, pelabuhan, dam, bendungan, serta prasarana sumber daya air lainnya. Fokus kami adalah efisiensi aliran dan ketahanan struktur jangka panjang.',
                'icon'          => '(SI001)',
                'gambar'        => null,
                'urutan'        => 2,
                'status'        => 'publish',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'judul_layanan' => 'Pembangunan Infrastruktur Jalan Raya',
                'slug'          => 'pembangunan-infrastruktur-jalan-raya',
                'deskripsi'     => 'Layanan khusus pelaksanaan kontruksi jalan raya (kecuali jalan layang), jalan lokal, rel kereta api, hingga landas pacu bandara. Kami memastikan kualitas pengaspalan dan fondasi yang mampu menahan beban kendaraan berat.',
                'icon'          => '(SI003)',
                'gambar'        => null,
                'urutan'        => 3,
                'status'        => 'publish',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'judul_layanan' => 'Kontruksi Jembatan & Jalan Layang',
                'slug'          => 'kontruksi-jembatan-jalan-layang',
                'deskripsi'     => 'Spesialisasi kami mencakup pengerjaan jembatan, jalan layang, terowongan, hingga jalur bawah tanah (subway). Menggunakan perhitungan teknis yang presisi untuk menghubungkan konektivitas antar wilayah.',
                'icon'          => '(SI004)',
                'gambar'        => null,
                'urutan'        => 4,
                'status'        => 'publish',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];

        foreach ($layanans as $data) {
            DB::table('layanan')->updateOrInsert(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}