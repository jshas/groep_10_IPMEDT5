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
        $request->session()->put('url.intended',url()->previous());
        $sensor = new sensor;
        $room = Room::find($room->id);
        $validated = $request->validate([
            'name' => 'required|unique:rooms|max:40',
            'type' => 'required'
                ]);
        $sensor->name = $validated['name'];
        $sensor->type = $validated['type'];
        $sensor->room_name = $room['name'];
        // dd($sensor);
        $room->sensors()->save($sensor);
        $request->session()->flash('message', 'Sensor added sucessfully!');
        return redirect($request->session()->get('url.intended'));
        
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified sensor from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
