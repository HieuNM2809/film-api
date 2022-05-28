<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuleRank extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value'
    ];

    public function iconRank()
    {
        return $this->hasMany(IconRank::class, 'id_icon', 'id');
    }
}
