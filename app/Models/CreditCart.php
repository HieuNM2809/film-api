<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cart_number',
        'date_expired',
        'avatar',
        'id_user'
    ];
}
