<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class HallService extends Model { use HasFactory; protected $fillable=['hall_id','service_id']; public function hall(){ return $this->belongsTo(Hall::class); } public function service(){ return $this->belongsTo(Service::class); } }
