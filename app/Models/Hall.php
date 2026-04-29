<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    //
    protected $fillable = [

        'name',
        'capacity',
        'price',
        'image'
    ];

    public function hall_owner()
    {
        return $this->belongsTo(HallOwner::class, 'hall_owner_id');
    }
    public function bookings()
{
    return $this->hasMany(Booking::class);
}
}
