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
        $roomTopics = RoomTopic::get();
        return view('rooms.create', ['rooms' => $rooms, 'roomTopics' => $roomTopics]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // , Room $room, RoomTopic $roomTopic
    public function store(Request $request){
        $room = new Room;
        $validated = $request->validate([
            'name' => 'required|unique:rooms|max:40',
                ]);
        $room->name = $validated['name'];
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
            ->with('room', $room);


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
        $room->update(["name" => $request['name']]);
        return redirect('rooms/index')->withSuccess(__('User updated successfully.'));
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

