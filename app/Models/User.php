<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_permission',
        'identity_card',
        'birthday',
        'avatar',
        'url',
        'location',
        'bio',
        'currently_learning',
        'skills',
        'work',
        'education'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

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

    public function userIconRank()
    {
        return $this->hasMany(UserIconRank::class, 'id_user', 'id');
    }
    public function userOrganization()
    {
        return $this->hasMany(UserOrganization::class, 'id_user', 'id');
    }
    public function donate()
    {
        return $this->hasMany(Donate::class, 'id_user', 'id');
    }
    public function creditCart()
    {
        return $this->hasMany(CreditCart::class, 'id_user', 'id');
    }
    public function post()
    {
        return $this->hasMany(Post::class, 'id_user', 'id');
    }
    public function userFeel()
    {
        return $this->hasMany(UserFeel::class, 'id_user', 'id');
    }
}
