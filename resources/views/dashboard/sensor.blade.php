@Switch($sensor->type)
    @case('Temperature')
        <article class="sensor">
            <h3 class= "sensor__name">{{ $sensor->name }}</h3>
            <section class="sensor__readout">
                <figure class="sensor__figure">
                    <img src="/icon/thermometer.png" alt="Black and white icon of a thermometer placed on a sun icon." class="sensor__img">
                </figure>
                <p class="sensor__value u-flex-center">{{ $sensor->value  }} &deg;C </p>
            </section>
        </article>
    @break

    @case('Flame')
        <article class="sensor" data-type="flame">
            <h3 class= "sensor__name"> {{$sensor->name}}</h3>
            <section class="sensor__readout">
                <figure class="sensor__figure">
                    <img src="/icon/fire.png" alt="A flame in black and white." class="sensor__img">
                </figure>
                <section class="sensor__value u-flex-center">
                    @switch($sensor->value)
                        @case(0) {{-- No flames detected --}}
                            <figure class="sensor__figure">
                                <img src="/icon/check.png" alt="A check, signifying safety." class="sensor__img">
                            </figure>
                            @break
                        @case(1) {{-- Flames detected --}}
                            <figure class="sensor__figure">
                                <img src="/icon/cross.png" alt="A cross, signifying danger." class="sensor__img">
                            </figure>
                            @break
                        @default
                            <p>?</p>
                    @endswitch
                </section>
            </section>
        </article>
    @break
@endswitch