
<article class="room"> <!-- All sensors per room -->
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
</article>
