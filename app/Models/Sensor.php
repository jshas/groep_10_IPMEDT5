<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Sensor extends Model
{
    protected $table = 'sensors';
    public $timestamps = false;
    use HasFactory;

    public function Sensor(){
        return $this->belongsTo(Room::class, 'room_name', 'name');   
    }
    
    
}
