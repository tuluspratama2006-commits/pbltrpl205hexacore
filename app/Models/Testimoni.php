<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';
    protected $primaryKey = 'id_testimoni';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'nama_client',
        'isi_testimoni',
        'foto_client',
        'rating',
        'status',
        'created_at',
    ];
}