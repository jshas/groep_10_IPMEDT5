@php
    $roomAlert = false;
    foreach($room->sensors as $sensor){
        if($sensor->value > 55){
            $roomAlert = true;
            break;
        };
    };
@endphp
{{-- Currently only relies on values reachable by temp sensor.  --}}


@if($roomAlert)
    <article class="room room--alert" > <!-- All sensors per room -->
        <header class="room__header">
            <h2 class="room__heading">{{ $room->name}}</h2>
            <section class="room__buttons room__buttons--edit">
                <a class="room__button" href="{{'/rooms/' . $room->name . '/edit'}}">Edit</a>
                <form action="{{ url('/rooms', ['id' => $room->id]) }}" method="post">
                    <input class="room__button" type="submit" value="Delete" />
                    @method('delete')
                    @csrf
                </form>

                <a class="room__button" onClick="deleteGrid()">close view</a>
            </section>
        </header>

        <section class="room__sensors">        
            @foreach($room->sensors as $sensor)
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
            @endforeach
        </section>
    </article>

@else
    <article class="room" > <!-- All sensors per room -->
        <header class="room__header">
            <h2 class="room__heading">{{ $room->name}}</h2>
        </header>

        <section class="room__sensors">        
            @foreach($room->sensors as $sensor)
                @switch($sensor->type)
                    @case('Temperature')
                        @include('dashboard.sensor.temperature')
                        @break        
                    @case('Flame') {{-- Has a 0 and 1 state in the DB. --}}
                        @include('dashboard.sensor.flame')
                        @break 
                    @default
                        <h1>Unknown sensor type. Check DB.h1>     
                @endswitch
            @endforeach
        </section>
        <section class="room__buttons">
            <button class="room__button" onClick="createGrid()">Detailed view</button>
            <button class="room__button" onClick="deleteGrid()">close view</button>
        </section>
            <div class="room__grid"></div>
    </article>
@endif
