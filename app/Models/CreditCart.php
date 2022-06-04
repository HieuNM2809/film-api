<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Base;

class CreditCart extends Base
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'cart_number',
        'date_expired',
        'avatar',
        'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
