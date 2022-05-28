<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IconRank extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_rule',
        'icon',
        'title',
    ];
    public function userIconRank()
    {
        return $this->hasMany(UserIconRank::class, 'id_icon', 'id');
    }
    public function ruleRank()
    {
        return $this->belongsTo(RuleRank::class, 'id_rule');
    }
}
