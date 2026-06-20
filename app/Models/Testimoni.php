<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';
    protected $primaryKey = 'id_testimoni';
    
    public $timestamps = false;
    
    protected $fillable = [
        'nama_client',
        'jabatan',
        'nama_perusahaan',
        'isi_testimoni',
        'foto_client',
        'rating',
        'status',
        'created_at',
    ];
    
    protected $casts = [
        'rating' => 'integer',
        'created_at' => 'datetime',
    ];
}