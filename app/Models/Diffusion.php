<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



/**
 * Class Diffusion
 * @package App\Models
 * @version March 21, 2021, 11:16 am UTC
 *
 */
class Diffusion extends Model
{
    protected $table = 'diffusions';

    protected $guarded = [];


    public function admin()
    {
        // return $this->belongsTo(Admin::class, 'admin_id');
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function type_diffusion()
    {
        return $this->belongsTo(TypeDiffusion::class);
    }
    public function media()
    {
        // return $this->hasOne(Media::class, 'source_id')->whereSource('diffusion');
        return $this->hasMany(Media::class, 'source_id')->whereSource('diffusion');
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
}
