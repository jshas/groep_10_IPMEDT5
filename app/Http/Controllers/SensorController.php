<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Sensor;

class SensorController extends Controller
{
    /**
     * Show the form for creating a new sensor.
     *
     * @param  int  $id (room id)
     * @return \Illuminate\Http\Response
     */
    public function create(Room $room)
    {
        return view('rooms.sensor.create', ['room' => $room]);
    }

    /**
     * Store a newly created sensor in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sensor $sensor, Room $room)
    {
        $request->session()->put('prev.url',url()->previous());
        $sensor = new sensor;
        $room = Room::find($room->id);
        $validated = $request->validate([
            'name' => 'required|unique:rooms|max:40',
            'type' => 'required',
            'location' => 'min:0|max:99',
                ]);
        $sensor->name = $validated['name'];
        $sensor->type = $validated['type'];
        $sensor->room_id = $room['id'];
        $sensor->topic = $validated['topic'];
        $sensor->location = $validated['location'];
        
        // dd($sensor);
        $room->sensors()->save($sensor);
        $request->session()->flash('message', 'Sensor added sucessfully!');
        return redirect($request->session()->get('prev.url'));
        
    }

    /**
     * Display the specified sensor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified sensor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensor $sensor, Room $room)
    {
        $room = Room::where('name', $sensor->room_id);
        return view('sensors.edit')->with([
            'sensor' => $sensor,
            'room' => $room,
        ]);
    }

    /**
     * Update the specified sensor in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sensor= Sensor::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|unique:rooms|max:40',
            'type' => 'required',
            'topic' => 'required|unique:sensor',
            'location' => 'required|min:0|max:99',
                ]);
        $sensor->name = $request['name'];
        $sensor->type = $request['type'];
        $sensor->topic = $request['topic'];
        $sensor->location = $request['location'];
        $sensor->save();
        return redirect('rooms');
    }

    /**
     * Remove the specified sensor from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {        
        $request->session()->put('prev.url',url()->previous());
        Sensor::destroy($id);
        return redirect('rooms');
    }
    
}


