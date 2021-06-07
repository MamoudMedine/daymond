<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devise extends Model
{
    protected $table = 'devises';

    protected $guarded = [];

    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }
}
