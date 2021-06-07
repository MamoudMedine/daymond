<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicite extends Model
{
    protected $table = 'publicites';

    protected $guarded = [];

    public function medias()
    {
        return $this->hasMany(Media::class);
    }
}
