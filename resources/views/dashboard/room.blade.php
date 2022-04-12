
<article class="room"> <!-- All sensors per room -->
    <header class="room__header">
        <h2 class="room__heading">{{ $room->name}}</h2>
    </header>
  

    <section class="room__sensors">

        @foreach($room->sensors as $sensor)
            @include('dashboard.sensor')
            
        @endforeach
        
    </section>
    <section class="room__buttons">
    <button class="room__button"  onClick="createGrid({{$sensor->id}})">Detailed view</button>
    <button class="room__button"  onClick="deleteGrid({{$sensor->id}})">close view</button>
    <button class="room__button"  onClick="sensorLocation({{$sensor->location}}, {{$sensor->id}})">grid fill</button>
</section>

    <div class="room__grid" id="{{$sensor->id}}"></div>
</article> 
