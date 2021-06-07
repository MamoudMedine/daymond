<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';

    protected $guarded = [];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'source_id')->where('source', 'produit');
    }

    public function publicite()
    {
        return $this->belongsTo(Publicite::class);
    }
}
