<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model{   

     public function client()
{
    return $this->belongsTo(Client::class);
}

public function hall()
{
    return $this->belongsTo(Hall::class);
}
}