<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserOrganization extends Base
{
    use HasFactory, SoftDeletes;
    protected $table = 'user_organizations';
    protected $fillable = [
        'id_user',
        'id_organization',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'id_organization');
    }
    public function getlistOrganizationsByIdUser($id_user){
        return $this->where('id_user', $id_user)->with('organization')->get();
    }
    public function getlistUserByIdOrganizations($id_organization){
        return $this->where('id_organization', $id_organization)->with('user')->get();
    }


}
