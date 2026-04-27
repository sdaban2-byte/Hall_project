<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Booking extends Model { use HasFactory; protected $fillable=['booking_date','guests_number','status','hall_id','client_id']; protected $casts=['booking_date'=>'datetime']; public function hall(){ return $this->belongsTo(Hall::class); } public function client(){ return $this->belongsTo(Client::class); } }
