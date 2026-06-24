<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'portofolio';

    protected $primaryKey = 'id_portofolio';

    // Daftarkan kolom yang boleh diisi via form CMS Portofolio
    protected $fillable = [
        'judul_proyek',
        'slug',
        'deskripsi',
        'lokasi',
        'tanggal_proyek',
        'nama_klien',
        'thumbnail',
        'file_pdf',
        'status',
        'id_admin',
    ];

    // Mengubah string tanggal_proyek menjadi objek Datetime/Carbon otomatis
    protected $casts = [
        'tanggal_proyek' => 'date', // Diganti 'date' (Y-M-D) sesuai format di database Anda
    ];
}
