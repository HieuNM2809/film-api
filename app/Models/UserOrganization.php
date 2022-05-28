<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrganization extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_organization',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_comment');
    }
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'id_organization');
    }
}
