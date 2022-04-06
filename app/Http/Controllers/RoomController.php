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
        $rooms = Room::with('sensors')->get();
        $rooms;
        return view('dashboard', ['rooms' => $rooms]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $rooms = Room::with('sensors')->get();
        $roomTopics = RoomTopic::get()->all();
        return view('rooms.create', ['rooms' => $rooms, 'roomTopics' => $roomTopics]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Room $room, RoomTopic $roomTopic){
        $validated = $request->validate([
            'name' => 'required|unique:rooms|max:40',
                ]);
        $room->name = $validated['name'];
        $room->save();
        return redirect('/rooms/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name){
        $room = Room::where('name', $name)->with('sensors')->first();
        return view('rooms.show', ['room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $room = Room::where('name', $name)->with('sensors')->first();
        return view('rooms.edit', ['room' => $room]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
        $newRoomname = $request->get()->first();
        $room = Room::where("name", $name);
        $room->name = $request->name;
        $room->save();
        return response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        //
    }
}

