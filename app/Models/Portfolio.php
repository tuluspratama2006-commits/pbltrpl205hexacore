<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model {
    protected $fillable = ['title','location','description','technical_specs','challenge_solution','result','project_date','thumbnail','images','order','is_active'];
    protected $casts = ['images' => 'array', 'project_date' => 'date'];
}
