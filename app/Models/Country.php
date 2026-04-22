<?php

namespace App\Models;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory;

      protected $fillable = [
        'country_name',
        'code',
       
    ];


    public function cities(){
        return $this->hasMany(City::class);
    }
}