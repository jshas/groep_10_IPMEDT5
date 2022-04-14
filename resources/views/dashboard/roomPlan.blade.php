
    <section class="room__details">
        <section class="room__description">
            <h3>Display a view of the room.</h2>

        </section>
        <section class="room__buttons">

            <button class="room__button"  onClick="createGrid({{ $room->id}}, {{ $room->sensors }}, {{ $room->layout }})" >Detailed view</button>
            <button class="room__button"  onClick="hideGrid({{$room->id}})">close view</button>


        </section>
            <article class="room__grid">

            </article>
            <p> Gray blocks signify furniture, green block signify sensors.</p>
    </section>

