<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 //use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class HallOwner extends Authenticatable
{
    //
         use HasFactory;

    protected $fillable = [

        'company_name',
        'email',
        'password',
        'is_verified'
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'actor', 'actor_type', 'actor_id', 'id');
    }


    public function halls()
    {
        return $this->hasMany(Hall::class);
    }
}