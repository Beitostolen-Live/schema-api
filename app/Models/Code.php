<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $table = 'code';

    protected $fillable = [
        'codesetid',
        'codeid', 
        'description', 
        'valid_from', 
        'valid_to'
    ];

    protected $hidden = [];

    public function codeset()
    {
        return $this->belongsTo(CodeSet::class);
    }
}
?>