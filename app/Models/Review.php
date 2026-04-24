<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
     protected $fillable = [
        'client_id',
        'rating',
        'comment',

    ];
      public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
