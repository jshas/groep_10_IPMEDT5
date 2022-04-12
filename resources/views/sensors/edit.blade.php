@extends('baseview')
@include('components.header')
<main class="main">
    <section class="form"> 
        <form class="form__form" action={{ "/sensor/" . $sensor->id}} method="POST">  
            @method('patch') 
            @csrf
            {{-- Form Description --}}
            <h2 class="form__heading">Edit {{ $sensor-> name }} ({{ $sensor->type }}) </h2>
            <section class="form__description">
                <p class="form__text">Sensor associated with the {{ $sensor->room_name}} group.  </p>
                <p class="form__text">This form is used to edit an existing sensor.</p>
            </section>

            {{-- Sensor name --}}
            <section class="form__section">
                <label class="form__label" for="name">Name</label>
               <input class="form__input @error('name') form__input--error @enderror id="name" placeholder="Name of the sensor." name="name" type="text" value={{ $sensor->name }}>
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
                
                <select class="form__input" name="type" id="type" required>
                    <option class="form__option" value="Flame" @if($sensor->type == 'Flame') selected @endif>Flame sensor</option>
                    <option class="form__option" value="Temperature"@if($sensor->type == 'Temperature') selected @endif>Temperature sensor</option>
                </select>    

            </section>

            <section class="form__section">
            <label class="form__label" for="sensorSelect">Select sensor location [0, 99]:</label>
                <input type="number" class="form__input" min=0 max=99>
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