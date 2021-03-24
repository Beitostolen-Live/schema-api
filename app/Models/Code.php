<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    public function codeset()
    {
        return $this->belongsTo(CodeSet::class);
    }

    protected $fillable = [
        'codeid', 'description', 'valid_from', 'valid_to'
    ];
}
?>