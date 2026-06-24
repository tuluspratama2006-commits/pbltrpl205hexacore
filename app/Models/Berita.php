<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $primaryKey = 'id_berita';

    // 3. Daftarkan kolom yang boleh diisi via form CMS
    protected $fillable = [
        'judul_berita',
        'slug',
        'isi_berita',
        'thumbnail',
        'tanggal_posting',
        'status',
        'id_admin',
    ];

    protected $casts = [
        'tanggal_posting' => 'datetime',
    ];
}
