<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeDiffusion extends Model
{
    protected $table = 'type_diffusions';

    protected $guarded = [];

    public function diffusions()
    {
        return $this->hasMany(Diffusion::class);
    }
}
