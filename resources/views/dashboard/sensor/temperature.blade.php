    @php
    $sensorArray = $sensor->messages->sortByDesc('id')->take(1)->pluck('value');
    $sensorValue = 0;
    if(count($sensorArray) > 0)
        $sensorValue = $sensorArray[0];
    @endphp

    @if($sensorValue >= 40 && $sensorValue <= 55) {{--  Warning state--}}
    <article class="sensor sensor--warning">
        <h3 class= "sensor__name sensor__name--warning">{{ $sensor->name . " (" . $sensor->topic . ")"}}</h3>

        <section class="sensor__readout">
            <figure class="sensor__figure">
                <img src="/icon/thermometer.png" alt="Black and white icon of a thermometer placed on a sun icon." class="sensor__img">
            </figure>
            <p class="sensor__value u-flex-center">{{ $sensorValue  }} &deg;C </p>
        </section>
        @include('dashboard.sensor.editSection')
    </article>

    @elseif($sensorValue >= 55) {{-- Alert state --}}
    <article class="sensor sensor--alert">
        <h3 class= "sensor__name sensor__name--warning">{{ $sensor->name . " (" . $sensor->topic . ")"}}</h3>
        <section class="sensor__readout">
            <figure class="sensor__figure">
                <img src="/icon/thermometer.png" alt="Black and white icon of a thermometer placed on a sun icon." class="sensor__img">
            </figure>
            <p class="sensor__value u-flex-center">{{ $sensorValue  }} &deg;C </p>
        </section>
        @include('dashboard.sensor.editSection')
    </article>

    @else
    <article class="sensor"> {{-- Normal state --}}
        <h3 class= "sensor__name sensor__name--warning">{{ $sensor->name . " (" . $sensor->topic . ")"}}</h3>
        <section class="sensor__readout">
            <figure class="sensor__figure">
                <img src="/icon/thermometer.png" alt="Black and white icon of a thermometer placed on a sun icon." class="sensor__img">
            </figure>
            {{-- <p class="sensor__value u-flex-center">{{ $sensorValue  }} &deg;C </p> --}}
            <p class="sensor__value u-flex-center">{{ $sensorValue  }} &deg;C </p>
        </section>
        @include('dashboard.sensor.editSection')
    </article>
    @endif
