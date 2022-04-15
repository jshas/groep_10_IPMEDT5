<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sensor;

class SensorMessage extends Model
{
    protected $table = "sensor_messages";
    public $timestamps = true;
    use HasFactory;

    public function sensor() {
        return $this->belongsTo(Sensor::class, 'sensor_topic', 'topic');
    }


}
