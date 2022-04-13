@extends('baseview')
@section('title', 'Create Room')
@section('subheading', 'Add Room' )
@include('components.header')
@include('components.sidebar')

@section('content')

<main class="main">
    <article class="form u-flex-center">
     <form class="form__form" action="/rooms" method="POST">   
            @csrf
            <h2 class="form__heading">Add New Room </h2>
            <section class="form__description">
                <p>This form is used to add rooms to the database. Every room name has to be unique.</p>
            </section>
            <section class="form__section">
                <label class="form__label" for="name">Name</label>
               <input class="form__input @error('name') form__input--error @enderror @if(Session::has('message')) form__input--confirmation"@endif id="name" placeholder="Name of the room (e.g: Basement)." name="name" type="text" value="{{ old('Name') }}">
               @if (Session::has('message'))
                <div class="form__confirmation">{{ Session::get('message') }}</div>
               @endif 
               @if ($errors->get('name'))
                    <section class="form__alert">
                        @foreach ($errors->get('name') as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </section>
                @endif    
            </section>

            {{-- <section class="form__section">
                <label class="form__label" for="MQTT-Topic">MQTT Topic</label>
                <input class="form__input  @error('MQTT-topic') form__input--error @enderror"  id="MQTT-Topic" placeholder="For example: basement" type="text" value="{{  old('MQTT-topic') }}">
                @if ($errors->get('MQTT-topic'))
                    <section class="form__alert">
                        @foreach ($errors->get('MQTT-topic') as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </section> 
                @endif    
            </section> --}}

                
            <section class="form__section">
                <section class="form__description">
                    <p>Cycle through the types of squares to toggle type..</p>
                </section>
                <section class="form__buttons">
                    <button type="button" class="form__button" id="js--openCreateGrid">Open grid</button>
                    <button type="button" class="form__button" id="js--closeCreateGrid">Close grid</button>
                    <button type="button" class="form__button" id="js--resetCreateGrid">Reset grid</button>
                </section>
                <article class="form-grid" id="js--roomGrid">
                    @for ($i = 0; $i < 100; $i++)
                        <div 
                        class="form-grid__item" 
                        id={{ 'js--grid-item-' . $i }} 
                        data-status="empty"
                        data-coordinate={{ $i }}
                        onClick="formGridItemHandler(event.target)"></div>

                    @endfor
                </article>
            </section>


            <section class="form__section">
                <button class="form__button" type="submit">Add Room</button>
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

        {{-- <article class="table  u-flex-center">
            <table class="table__table">
                <tr class="table__row">
                    <th class="table__header">Current RoomTopics</th>
                </tr>
                @foreach($roomTopics as $roomTopic)
                    <tr class="table__row">
                        <td class="table__text">{{ $roomTopic->topic }}</td>
                    </tr>
                @endforeach
            </table>
        </article> --}}

    </article>
</main>
@endsection