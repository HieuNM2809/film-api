<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'id_group_permission',
        'create',
        'delete',
        'edit',
        'view'
    ];

    public function groupPermission()
    {
        return $this->belongsTo(GroupPermission::class, 'id_group_permission');
    }
}
