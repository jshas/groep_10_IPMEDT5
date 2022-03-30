@extends('baseview')
@section('title', 'Create Room')
@section('subheading', 'Add Room' )
@include('components.header')

@section('content')

<main class="create-room">
    <article class="form u-flex-center">
        <form class="form__form" action="/rooms" method="POST">
            @csrf
            <h2 class="form__header">Add New Room </h2>
            <section class="form__section">
                <label class="form__label" for="name">Name</label>
                <input class="form__input" id="name" placeholder="Name of the room." name="name" type="text" value="{{ old('name') }}">
                @if ($errors->name)
                <section class="form__alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </section>
                @endif    
            </section>
    
            <section class="form__section">
                <label class="form__label" for="MQTT-Topic">MQTT Topic</label>
                <input class="form__input" id="MQTT-Topic" placeholder="" type="text">
            </section>
    
            <section class="form__section">
                <button class="form__button type="submit">Add Room</button>
            </section>
        </form>

            <article class="table  u-flex-center">
                <table class="table__table">
                    <tr class="table__row">
                        <th class="table__header">Current Rooms</th>
                    </tr>
                    @foreach($rooms as $room)
                        <tr class="table__row">
                            <td class="table__text">{{ $room->name }}</td>
                        </tr>
                    @endforeach
                </table>
            </article>
    </article>




</main>



@endsection