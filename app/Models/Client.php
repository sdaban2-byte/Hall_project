<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
     public function user(){
        return $this->morphOne(User::class ,'actor','actor_type','actor_id','id');

    }
    public function reviews()
{
    return $this->hasMany(Review::class);
}
}
