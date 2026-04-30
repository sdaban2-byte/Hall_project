<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = [
        'hall_id',
        'client_id',
        'booking_date',
        'start_time',
        'end_time',
        'status',
        'gesuts_num',
        'notes',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
