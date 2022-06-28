<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class AlertAdmin extends Base
{
    use HasFactory, SoftDeletes;
    protected $table = "alert_admin";

    protected $fillable = [
        'id',
        'title',
        'content',
        'id_user',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function getData()
    {
        return DB::table('alert_admin')->leftJoin('users', 'users.id', $this->table.'.id_user')
                    ->select('title', 'content', $this->table.'.created_at','name')
                    ->orderBy('created_at','DESC')->get();
    }
}
