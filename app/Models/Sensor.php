<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\SensorMessage;
use DB; 

class Sensor extends Model
{
    protected $table = 'sensors';
    public $timestamps = false;
    use HasFactory;

    public function room(){
        return $this->belongsTo(Room::class, 'room_id', 'id');   
    }

    public function messages(){
        return $this->hasMany(SensorMessage::Class, 'sensor_topic', 'topic');
    }

    public function latestMessage(){

        return $this->hasOne(SensorMessage::class, 'sensor_topic', 'topic');
        
    }
    
}
