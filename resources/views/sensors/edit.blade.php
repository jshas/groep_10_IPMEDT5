@extends('baseview')
@include('components.header')
@section('additional-js-scripts')
<script src="/js/editSensor.js" defer></script>
@endsection

<main class="main main--edit">
    <section class="form"> 
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
            <label class="form__label" for="location">Select sensor location [0, 99]:</label>
                <input type="number" name="location" id="location" class="form__input" min=0 max=99 value={{ $sensor->location }}>
            </section>

            {{-- Confirm button --}}
            <section class="form__section">
                <button class="form__button type="submit">Edit Sensor</button>
            </section>

        </form>

    
        </section>
        <article class="form-grid form-grid--edit form-grid--visible" 
        id="js--roomGrid" 
        data-current-sensor="{{ $sensor->location }}"
        data-room="{{ $sensor->room->layout }}" 
        >
            @for($i = 0; $i < 100; $i++)
                <div data-coordinate={{ $i }} class="form-grid__item form-grid__item--interactive"></div>
            @endfor
        </article>
</main>
