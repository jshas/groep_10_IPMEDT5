@extends('baseview')
@include('components.header')
<main class="main main--edit">
    <section class="form"> 
        <form class="form__form" action={{ "/rooms/" . $room->id. "/sensor"}} method="POST">   
            @csrf
            {{-- Form Description --}}
            <h2 class="form__heading">Add new sensor </h2>
            <section class="form__description">
                <p>This form is used to add a new sensor to the database. It's recommended to name flame-temperature pairs the same (e.g: 'North').</p>
            </section>

            {{-- Sensor name --}}
            <section class="form__section">
                <label class="form__label" for="name">Name</label>
               <input class="form__input @error('name') form__input--error @enderror id="name" placeholder="Name of the room (e.g: Basement)." name="name" type="text" value="{{ old('Name') }}">
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

            <section class="form__section">
                <label class="form__label" for="topic">MQTT Topic</label>
                <input class="form__input  @error('topic') form__input--error @enderror"  id="topic" placeholder="For example: basement" type="text" value="{{  old('topic') }}">
                @if ($errors->get('topic'))
                    <section class="form__alert">
                        @foreach ($errors->get('topic') as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </section> 
                @endif    
            </section>

            <section class="form__section">
                <label class="form__label" for="sensorSelect">Choose a sensor type:</label>

                <select class="form__select" name="type" id="type" required>
                    {{-- <option class="form__option" value="">--Please choose an option--</option> --}}
                    <option class="form__option" value="Flame" >Flame sensor</option>
                    <option class="form__option" value="Temperature">Temperature sensor</option>
                </select>    

            </section>

            <section class="form__section">
                <label class="form__label" for="location">Select sensor location [0, 99]:</label>
                    <input type="number" name="location" id="location" class="form__input" min=0 max=99 value=0>
            </section>



            {{-- Confirm button --}}
            <section class="form__section">
                <button class="form__button type="submit">Add Sensor</button>
            </section>

        </form>
    </section>


    @include('dashboard.room')
</main>
@include('components.sidebar')