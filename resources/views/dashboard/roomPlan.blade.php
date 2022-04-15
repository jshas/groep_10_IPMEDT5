
    <section class="room__details">
        <section class="room__buttons">
            <h3 class="room__heading room__heading--small">Display a view of the room.</h2>

            <button class="room__button"  onClick="createGrid({{ $room->id}}, {{ $room->sensors }}, {{ $room->layout }})" >Detailed view</button>
            <button class="room__button"  onClick="hideGrid({{$room->id}})">close view</button>


        </section>
        <p class="room__description"> Gray blocks signify furniture, green block signify sensors.</p>
            <article class="room__grid">
            </article>

    </section>
