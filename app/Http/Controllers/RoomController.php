<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Sensor;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::with('sensors')->get();
        $sensors = \App\Models\Sensor::all();

        foreach($sensors as $sensor) {
            if($sensor->value >= 50 or $sensor->value == 1) {
                return $this->fire();
            }
        }
        return view('dashboard', ['rooms' => $rooms]);
    }

    public function show($name){
        return Room::where('name', $name);
    }

    public function fire(){
        // Maken van variabelen om het leven makkelijker te maken
        // Twee soorten variabelen Temperatuur & Infrarood
        $temperature_sensors = \App\Models\Sensor::where("type", "Temperature")->get();
        $temp_name = "";
        $temp_room_name = "";

        $flame_sensors = \App\Models\Sensor::where("type", "Flame")->get();
        $flame_name = "";
        $flame_room_name = "";

        // Voor elke soort sensor loopen we door alle mogelijkheden heen
        foreach($temperature_sensors as $temp){
            // Voorwaarde voor de eerste sensor
            if($temp->value >= 50){
                // Namen opslaan van locatie en naam van de kamer
                $temp_name = $temp->name;
                $temp_room_name = $temp->room_name;
                // Loopen door de tweede sensor
                foreach($flame_sensors as $flame){
                    // Als de locatie en de naam van de kamer van beide sensoren gelijk zijn ga verder
                    if($flame->name == $temp_name && $flame->room_name == $temp_room_name){
                        // Voorwaarde voor de tweede sensor
                        if($flame->value == 1){
                            // Ga naar /sms om een sms te sturen
                            return redirect('/sms');
                        }
                    }        
                }
            }
        }
        // Precies hetzelfde als de eerste, maar hier zijn de sensoren omgedraait
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
        $rooms = Room::with('sensors')->get();
        return view('dashboard', ['rooms' => $rooms]);
    }
}
