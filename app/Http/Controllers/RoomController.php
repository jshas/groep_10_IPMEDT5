<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Sensor;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::with('sensors')->get();
        return $rooms;
        // return view('welcome', ['user' => $user, 'product' => $product]);
    }

    public function show($name){
        return Room::where('name', $name);
    }
}
