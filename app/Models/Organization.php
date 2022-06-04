<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Base;

class Organization extends Base
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
    ];

    public function userOrganization()
    {
        return $this->hasMany(UserOrganization::class, 'id_organization', 'id');
    }
}
