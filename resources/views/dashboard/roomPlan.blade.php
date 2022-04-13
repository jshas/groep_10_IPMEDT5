
<section class="room__buttons">
    <button class="room__button"  onClick="createGrid({{$room->id}})">Detailed view</button>
    <button class="room__button"  onClick="deleteGrid({{$room->id}})">close view</button>
    <button class="room__button"  onClick="sensorLocation({{$sensor->location}}, {{$room->id}})">grid fill</button>
</section>
    <div class="room__grid" id="{{$room->id}}"></div>