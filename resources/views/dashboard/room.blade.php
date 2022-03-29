
<a href="/room"><article class="room"> <!-- All sensors per room -->
    <header class="room__header">
        <h2 class="room__heading">{{ $room->name}}</h2>
    </header>
  

    <section class="room__sensors">        
        @foreach($room->sensors as $sensor)
            @include('dashboard.sensor')
        @endforeach
    </section>

</article></a>
