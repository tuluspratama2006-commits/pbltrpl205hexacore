<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Document extends Model {
    protected $fillable = ['title','file_path','file_size','download_count','is_active'];
}
