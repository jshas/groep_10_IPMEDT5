@extends('baseview')
@section('title', 'Room functions')
@include('components.header')

@section('content')
    <table class="table">
        <tr class="table__row">
        <th class="table__header">Current Rooms</th>
        </tr>
        @foreach($rooms as $room)
            <tr>
                <td class="table__text">{{ $room->name }}</td>
                <td><button>edit</button></td>
                <td><button>delete</button></td>
            </tr>
        @endforeach
    </table>

    <form action="/rooms" method="POST">
        @csrf

        <label for="name">Name</label>
        <input id="name" placeholder="Name of the room." name="name" type="text">

        <label for="MQTT-Topic">MQTT Topic</label>
        <input id="MQTT-Topic" name="Name of the topic. (e.g: "basement")" type="text">

        <button type="submit">Add Room</button>

    </form>

@endsection