<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupPermission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_permission');
    }
    public function permission()
    {
        return $this->hasMany(Permission::class, 'id_group_permission', 'id');
    }
}
