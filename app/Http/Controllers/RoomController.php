<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Sensor;

class RoomController extends Controller
{
    
    public function index(){
        $rooms = Room::with('sensors')->get();
        return view('dashboard', ['rooms' => $rooms]);
    }
    
    public function show($name){
        return Room::where('name', $name);
    }

    public function create(){
        $rooms = Room::with('sensors')->get();
        return view('rooms.create', ['rooms' => $rooms]);
    }

    public function store(Request $request, Room $room){
        $room-> name = $request->input('name');
        $room->save();
        return view('rooms.create');
    }
}
