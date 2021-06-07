<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $guarded = [];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
    public function media()
    {
        return $this->hasMany(Media::class, 'source_id')->whereSource('notification');
    }
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
