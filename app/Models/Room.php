<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    public $timestamps = false;

    protected $casts = [
        'layout' => 'array',
    ];
    
    // protected $primaryKey = 'name';
    // public $incrementing = true;
    // protected $keyType = ' string';



    // public function getRouteKeyName(){
    //     return 'name';
    // }

    public function sensors()
    {
        return $this->hasMany(Sensor::class, 'room_id', 'id');
    }

    // public function getRouteKeyName()
    // {
    //     return 'name';
    // }

}
