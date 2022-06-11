<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RuleRank extends Base
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'value'
    ];

    public function iconRank()
    {
        return $this->hasMany(IconRank::class, 'id_icon', 'id');
    }
}
