<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminActivity extends Model
{
    protected $table = 'admin_activities';
    
    protected $fillable = [
        'admin_name',
        'aksi',
        'target',
        'is_read',
    ];
    
    protected $casts = [
        'is_read' => 'boolean',
    ];
}