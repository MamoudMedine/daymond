<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    //  */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'phone',
    //     'profession',
    //     'password',
    //     'is_confirmed'
    // ];
    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function scopeAdmins($query){
        return $query->where('is_admin', true);
    }
    function scopeUtilisateurs($query){
        return $query->where('is_admin', false);
    }


    public function utilisateur()
    {
        return $this->hasOne(Utilisateur::class);
    }
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function historiques()
    {
        return $this->hasMany(Historique::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
