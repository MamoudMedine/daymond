<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $table = 'admins';

    protected $guarded = [];

    public function diffusions()
    {
        return $this->hasMany(Diffusion::class);
    }
    // public function notifications()
    // {
    //     return $this->hasMany(Notification::class);
    // }
}
