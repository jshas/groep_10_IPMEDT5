<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Sensor;
use App\Models\RoomTopic;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $rooms = Room::with('sensors')->orderBy('id')->get();
        
        $sensors = \App\Models\Sensor::all();

        // Kijk of er een abnormale waarde is. Als dat zo is ga dan naar de fire functie waar alles wordt nagekeken.
        // Bij geen abnormale waardes return dan de homepagina.
        foreach($sensors as $sensor) {
            $sensorArray = $sensor->messages->sortByDesc('id')->take(1)->pluck('value');
            $sensorValue = 0;
            if(count($sensorArray) > 0) {
                $sensorValue = $sensorArray[0];
            }
            if($sensorValue >= 50 or $sensorValue == 1) {
                return $this->fire();
            }
        }
        // echo $rooms;
        return view('rooms.index', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $rooms = Room::with('sensors')->get();
        return view('/rooms/create', ['rooms' => $rooms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // , Room $room, RoomTopic $roomTopic
    public function store(Request $request){
        $roomLayoutArray = [];
        $room = new Room;
        $validated = $request->validate([
            'name' => 'required|unique:rooms|max:40',
                ]);
        $room->name = $validated['name'];
        $layoutJson = json_encode($request->layout);
        // $room->layout = $request->layout;
        $room->layout = $layoutJson;
        $room->save();
        $request->session()->flash('message', 'Room added sucessfully!');
        return redirect('/rooms/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room){
        return view('rooms.show', ['room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('rooms.edit')
            ->with(['room' => $room]);
                

        return view('dashboard', ['rooms' => $rooms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $previousName = $room->name;
        $validated = $request->validate([
            'name' => 'unique:rooms|max:40',
                ]);
        if($validated['name'] != ''){
            $room->name = $validated['name'];
        }else{
            $room->name = $previousName;
        }
        if($request->layout != []){
            $layoutJson = json_encode($request->layout);
            $room->layout = $layoutJson;
        }
        $room->save();
        return redirect('rooms')->withSuccess(__('User updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::destroy($id);
        return redirect('rooms');
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

        $sensorArray = $sensor->messages->sortByDesc('id')->take(1)->pluck('value');
            $sensorValue = 0;
            if(count($sensorArray) > 0) {
                $sensorValue = $sensorArray[0];
            }

        // Voor elke soort sensor loopen we door alle mogelijkheden heen
        foreach($temperature_sensors as $temp){
            $sensorArray = $temp->messages->sortByDesc('id')->take(1)->pluck('value');
            $tempSensorValue = 0;
            if(count($sensorArray) > 0) {
                $tempSensorValue = $sensorArray[0];
            }
            // Voorwaarde voor de eerste sensor
            if($tempSensorValue >= 50){
                // Namen opslaan van locatie en naam van de kamer
                $temp_name = $temp->name;
                $temp_room_name = $temp->room_name;
                // Loopen door de tweede sensor
                foreach($flame_sensors as $flame){
                    $sensorArray = $flame->messages->sortByDesc('id')->take(1)->pluck('value');
                    $flameSensorValue = 0;
                    if(count($sensorArray) > 0) {
                        $flameSensorValue = $sensorArray[0];
                    }
                    // Als de locatie en de naam van de kamer van beide sensoren gelijk zijn ga verder
                    if($flame->name == $temp_name && $flame->room_name == $temp_room_name){
                        // Voorwaarde voor de tweede sensor
                        if($flameSensorValue == 1){
                            // Ga naar /sms om een sms te sturen
                            return redirect('/sms');
                        }
                    }        
                }
            }
        }
        foreach($flame_sensors as $flame){
            $sensorArray = $flame->messages->sortByDesc('id')->take(1)->pluck('value');
            $flameSensorValue = 0;
            if(count($sensorArray) > 0) {
                $flameSensorValue = $sensorArray[0];
            }
            // Voorwaarde voor de eerste sensor
            if($flameSensorValue == 1){
                // Namen opslaan van locatie en naam van de kamer
                $flame_name = $flame->name;
                $flame_room_name = $flame->room_name;
                // Loopen door de tweede sensor
                foreach($temperature_sensors as $temp){
                    $sensorArray = $temp->messages->sortByDesc('id')->take(1)->pluck('value');
                    $tempSensorValue = 0;
                    if(count($sensorArray) > 0) {
                        $tempSensorValue = $sensorArray[0];
                    }
                    // Als de locatie en de naam van de kamer van beide sensoren gelijk zijn ga verder
                    if($flame->name == $temp_name && $flame->room_name == $temp_room_name){
                        // Voorwaarde voor de tweede sensor
                        if($tempSensorValue >= 50){
                            // Ga naar /sms om een sms te sturen
                            return redirect('/sms');
                        }
                    }        
                }
            }
        }



        // // Precies hetzelfde als de eerste, maar hier zijn de sensoren omgedraait
        // foreach($flame_sensors as $flame){
        //     if($flame->value == 1){
        //         $flame_name = $flame->name;
        //         $flame_room_name = $flame->room_name;
        //         foreach($temperature_sensors as $temp){
        //             if($temp-> name == $flame_name && $temp->room_name == $flame_room_name){
        //                 if($temp->value >= 50){
        //                     return redirect('/sms');
        //                 }
        //             }
        //         }
        //     }

        // }
        // Nadat alles is nagekeken en er geen vuur is gedetecteerd wordt de homepagina weergegeven.
        $rooms = Room::with('sensors')->get();
        return view('dashboard', ['rooms' => $rooms]);
    }
}

