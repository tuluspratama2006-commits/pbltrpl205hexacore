<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilPerusahaan extends Model
{
    protected $table = 'profil_perusahaan';

    protected $primaryKey = 'id_profil';

    protected $fillable = [
        'nama_perusahaan',
        'tagline',
        'deskripsi',
        'visi',
        'misi',
        'hero_image',
        'foto_grid',
        'alamat',
        'alamat_2',
        'email',
        'telepon',
        'telepon_2',
        'whatsapp',
        'instagram',
        'facebook',
        'linkedin',
        'maps_embed',
        'maps_embed_2',
        'nomor_sertifikasi',
    ];
}
