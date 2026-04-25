<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HallOwner extends Model
{
    //


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
