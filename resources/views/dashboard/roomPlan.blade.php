
<section class="room__buttons">
    <button class="room__button"  onClick="createGrid({{$sensor->id}})">Detailed view</button>
    <button class="room__button"  onClick="deleteGrid({{$sensor->id}})">close view</button>
    <button class="room__button"  onClick="sensorLocation({{$sensor->location}}, {{$sensor->id}})">grid fill</button>
</section>
    <div class="room__grid" id="{{$sensor->id}}"></div>