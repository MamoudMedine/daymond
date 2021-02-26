<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';

    protected $guarded = [];

    public function diffusions()
    {
        return $this->hasMany(Diffusion::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
