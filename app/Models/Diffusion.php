<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diffusion extends Model
{
    protected $table = 'diffusions';

    protected $guarded = [];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function type_diffusion()
    {
        return $this->belongsTo(TypeDiffusion::class);
    }
}
