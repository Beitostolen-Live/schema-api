<?php

namespace App\Model;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Schema extends Model
{
    use UsesUuid;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['uuid'];

    public function schema($id)
    {
        return $this->with($this->with)->findOrFail($id);
    }
}
?>