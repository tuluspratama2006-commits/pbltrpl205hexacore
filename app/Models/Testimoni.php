<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';
    protected $primaryKey = 'id_testimoni';
    public $incrementing = true;

    protected $fillable = [
        'nama_client',
        'jabatan',
        'nama_perusahaan',
        'foto_client',
        'rating',
        'isi_testimoni',
        'status',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];
}