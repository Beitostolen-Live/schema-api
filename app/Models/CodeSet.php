<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeSet extends Model
{
    public function codes()
    {
        return $this->hasMany(Code::class);
    }

    protected $fillable = [
        'name', 'description'
    ];
}
?>