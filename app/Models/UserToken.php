<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserToken extends Base
{
    use HasFactory, SoftDeletes;
    protected $table ="user_token";
    protected $fillable = [
        'email',
        'token',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'email');
    }
    // create token
    public function createToken($data){
        return $this->create($data);
    }
    // get token sby mail
    public function getTokenByMail($email){
        return $this->where('email', $email)->orderBy('created_at','DESC')->first();
    }
}
