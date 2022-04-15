@php
 $sensorArray = $sensor->messages->sortByDesc('id')->take(1)->pluck('temp_value');
 $sensorValue = 0;
 if(count($sensorArray) > 0)
     $sensorValue = $sensorArray[0]

@endphp

@if($sensor->value >= 40 && $sensor->value <= 55) {{--  Warning state--}}
<article class="sensor sensor--warning">
    <h3 class= "sensor__name sensor__name--warning">{{ $sensor->name }}</h3>
    <section class="sensor__readout">
        <figure class="sensor__figure">
            <img src="/icon/thermometer.png" alt="Black and white icon of a thermometer placed on a sun icon." class="sensor__img">
        </figure>
        <p class="sensor__value u-flex-center">{{ $sensorValue  }} &deg;C </p>
    </section>
    @include('dashboard.sensor.editSection')
</article>

@elseif($sensor->value >= 55) {{-- Alert state --}}
<article class="sensor sensor--alert">
    <h3 class= "sensor__name sensor__name--alert">{{ $sensor->name }}</h3>
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
    <h3 class= "sensor__name">{{ $sensor->name }}</h3>
    <section class="sensor__readout">
        <figure class="sensor__figure">
            <img src="/icon/thermometer.png" alt="Black and white icon of a thermometer placed on a sun icon." class="sensor__img">
        </figure>
        {{-- <p class="sensor__value u-flex-center">{{ $sensor->value  }} &deg;C </p> --}}
        <p class="sensor__value u-flex-center">{{ $sensorValue  }} &deg;C </p>
    </section>
    @include('dashboard.sensor.editSection')
</article>
@endif
