<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'genre',
        'birth',
        'state',
        'connexionNumber',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relations

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users', 'users_id', 'roles_id') -> withTimestamps();
    }

    public function abonnements()
    {
        return $this->belongsTo('App\Models\Abonnement');
    }

    public function likes()
    {
        return $this->belongsTo('App\Models\Like');
    }

    public function ecoutes()
    {
        return $this->belongsTo('App\Models\Ecoute');
    }

    public function playlists()
    {
        return $this->belongsTo('App\Models\Playlist');
    }

    public function searchs()
    {
        return $this->belongsTo('App\Models\Search');
    }
}
