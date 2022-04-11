@if($sensor-> value == 0) {{--  No fire detected. --}}
<article class="sensor" data-type="flame">
    <h3 class= "sensor__name"> {{$sensor->name}}</h3>
    <section class="sensor__readout">
        <figure class="sensor__figure">
            <img src="/icon/fire.png" alt="A flame in black and white." class="sensor__img">
        </figure>
        <section class="sensor__value u-flex-center">
                    <figure class="sensor__figure">
                        <img src="/icon/check.png" alt="A check, signifying safety." class="sensor__img">
                    </figure>
        </section>
    </section>
    <section class="sensor__buttons sensor__buttons--edit">
        <a class="sensor__button" href="{{'/sensors/' . $sensor->id . '/edit'}}">Edit</a>
        <form action="{{ url('/rooms', ['id' => $room->id]) }}" method="post">
            <input class="sensor__button" type="submit" value="Delete" />
            @method('delete')
            @csrf
        </form>
    </section>
</article>

@elseif($sensor->value==1) {{--  Fire detected. This is not fine. --}}
<article class="sensor sensor--alert" data-type="flame">
    <h3 class= "sensor__name"> {{$sensor->name}}</h3>
    <section class="sensor__readout">
        <figure class="sensor__figure">
            <img src="/icon/fire.png" alt="A flame in black and white." class="sensor__img">
        </figure>
        <section class="sensor__value u-flex-center">
            <figure class="sensor__figure">
                <img src="/icon/cross.png" alt="A cross, signifying danger." class="sensor__img">
            </figure>
        </section>
    </section>
</article>

@else {{--  Incorrect value. --}}
<article class="sensor" data-type="flame">
    <h3 class= "sensor__name"> {{ $sensor->name }} </h3>
    <section class="sensor__readout">
        <figure class="sensor__figure">
            <img src="/icon/fire.png" alt="A flame in black and white." class="sensor__img">
        </figure>
        <section class="sensor__value u-flex-center">
            <p>No correct sensor value detected. Check DB directly.</p>
        </section>
    </section>
</article>
@endif