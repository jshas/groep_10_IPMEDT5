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

    <form action="">
        @csrf
    </form>
    
@endsection