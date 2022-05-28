<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class React extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'text_feel',
    ];

    public function react()
    {
        return $this->hasMany(React::class, 'id_react', 'id');
    }
}
