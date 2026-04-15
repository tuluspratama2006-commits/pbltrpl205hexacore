<?php
// app/Models/CompanyProfile.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $table = 'settings';
    protected $fillable = ['key', 'value'];

    public static function get($key, $default = null)
    {
        $record = static::where('key', $key)->first();
        return $record ? $record->value : $default;
    }
}
