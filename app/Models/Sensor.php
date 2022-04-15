<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use DB; 
use App\Models\SensorMessage;

class Sensor extends Model
{
    protected $table = 'sensors';
    public $timestamps = false;
    use HasFactory;

    public function room(){
        return $this->belongsTo(Room::class, 'room_id', 'id');   
    }

    public function message(){
        $latestValue = DB::table('sensor_messages')->where('')
        
    }


    $sensor->
    
    
}
