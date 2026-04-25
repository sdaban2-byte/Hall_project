<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    

      protected $fillable = [
        'country_name',
        'street',
       'country_id',
    
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }


}