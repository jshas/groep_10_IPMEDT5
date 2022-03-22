<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    use HasFactory;

    public function sensors()
    {
        return $this->hasMany(Sensor::class, 'room_name', 'name');
    }

}
