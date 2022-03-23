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

    public function fire(){
        $sensors = \App\Models\Sensor::all();
        $temperature_sensors = \App\Models\Sensor::where("type", "Temperature")->get();
        $temp_name = "";
        $temp_room_name = "";

        $flame_sensors = \App\Models\Sensor::where("type", "Flame")->get();
        $flame_name = "";
        $flame_room_name = "";
        
        foreach($temperature_sensors as $temp){
            if($temp->value >= 50){
                $temp_name = $temp->name;
                $temp_room_name = $temp->room_name;
                foreach($flame_sensors as $flame){
                    if($flame->name == $temp_name && $flame->room_name == $temp_room_name){
                        if($flame->value == 1){
                            return redirect('/sms');
                        }
                    }        
                }
            }
        }
        foreach($flame_sensors as $flame){
            if($flame->value == 1){
                $flame_name = $flame->name;
                $flame_room_name = $flame->room_name;
                foreach($temperature_sensors as $temp){
                    if($temp-> name == $flame_name && $temp->room_name == $flame_room_name){
                        if($temp->value >= 50){
                            return redirect('/sms');
                        }
                    }
                }
            }

        }
    }
}
