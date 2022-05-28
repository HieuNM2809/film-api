<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Post;
use Illuminate\Database\Eloquent\SoftDeletes;

class TitleType extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'type',
    ];


    public function post()
    {
        return $this->hasMany(Post::class, 'id_title_type', 'id');
    }
}
