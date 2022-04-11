@extends('baseview')
@include('components.header')
<main class="main">
    <section class="form"> 
        <form class="form__form" action={{ "/sensor/" . $sensor->id}} method="POST">  
            @method('patch') 
            @csrf
            {{-- Form Description --}}
            <h2 class="form__heading">Edit {{ $sensor->name }}  </h2>
            <section class="form__description">
                <p>This form is used to add an existing sensor.</p>
            </section>

            {{-- Sensor name --}}
            <section class="form__section">
                <label class="form__label" for="name">Name</label>
               <input class="form__input @error('name') form__input--error @enderror id="name" placeholder="Name of the sensor." name="name" type="text" value="{{ old('Name') }}">
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
                <label class="form__label" for="sensorSelect">Choose a sensor type:</label>
                
                <select class="form__select" name="type" id="type" required>
                    <option class="form__option" value="">--Please choose an option--</option>
                    <option class="form__option" value="Flame">Flame sensor</option>
                    <option class="form__option" value="Temperature">Temperature sensor</option>
                </select>    

            </section>


            {{-- Confirm button --}}
            <section class="form__section">
                <button class="form__button type="submit">Add Sensor</button>
            </section>

        </form>
    </section>
    <section class="form__sensors">        
        @switch($sensor->type)
            @case('Temperature')
                @include('dashboard.sensor.temperature')
                @break        
            @case('Flame') {{-- Has a 0 and 1 state in the DB. --}}
                @include('dashboard.sensor.flame')
                @break 
            @default
                <h1>Unknown sensor type. Check DB </h1>     
        @endswitch
    </section>
    <section class="room__buttons room__buttons--edit">
</main>
@include('components.sidebar')