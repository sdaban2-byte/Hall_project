<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class Client extends Authenticatable
{
    use HasFactory , HasRoles;
     public function user(){
        return $this->morphOne(User::class ,'actor','actor_type','actor_id','id');

    }
    public function reviews()
{
    return $this->hasMany(Review::class);
}
public function bookings()
{
    return $this->hasMany(Booking::class);
}

}