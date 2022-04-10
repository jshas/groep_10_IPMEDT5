<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    public $timestamps = false;
    
    // protected $primaryKey = 'name';
    // public $incrementing = false;
    // protected $keyType = ' string';


    
    protected $fillable = [
        'name',
    ];


    public function getRouteKeyName(){
        return 'name';
    }

    public function sensors()
    {
        return $this->hasMany(Sensor::class, 'room_name', 'name');
    }

    // public function getRouteKeyName()
    // {
    //     return 'name';
    // }

}
