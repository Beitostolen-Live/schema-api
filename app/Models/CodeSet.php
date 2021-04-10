<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeSet extends Model
{
    protected $table = 'codeset';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 
        'name', 
        'description',
        'typeCodeSetId',
        'typeCodeId'
    ];

    protected $hidden = [];

    public function codes()
    {
        return $this->hasMany(Code::class);
    }
}
?>