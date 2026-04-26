<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;
     public function user(){
        return $this->morphOne(User::class ,'actor','actor_type','actor_id','id');

    }
    public function reviews()
{
    return $this->hasMany(Review::class);
}
}