
<section class="room__buttons">
    <button class="room__button"  onClick="createGrid({{ $room->sensors}}, {{$room->id}})">Detailed view</button>
    <button class="room__button"  onClick="deleteGrid({{$room->id}})">close view</button>
</section>
    <div class="room__grid" id="{{$room->id}}"></div>