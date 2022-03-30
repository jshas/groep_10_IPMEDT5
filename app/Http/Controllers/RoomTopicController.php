<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomTopicController extends Controller
{
    public function store(Request $request, Room $roomTopic){
        $validated = $request->validate([
            'topic' => 'required|unique:room_topics|max:40',
        ]);
        $roomTopic->name = $validated['topic'];
        $room->save();
    }

}
