<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorMessage extends Model
{
    protected $table = "sensor_messages";
    use HasFactory;

    public function sensor() {

    }
}
