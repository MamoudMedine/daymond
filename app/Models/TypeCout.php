<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeCout extends Model
{
    protected $table = 'type_couts';

    protected $guarded = [];

    public function couts()
    {
        return $this->hasMany(Cout::class);
    }
}
