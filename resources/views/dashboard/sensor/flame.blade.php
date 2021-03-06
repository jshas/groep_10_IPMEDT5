@php
    $sensorArray = $sensor->messages->sortByDesc('id')->take(1)->pluck('value');
    $sensorValue = 0;
    if(count($sensorArray) > 0)
        $sensorValue = $sensorArray[0];
@endphp

@if($sensorValue == 0) {{--  No fire detected. --}}
<article class="sensor" data-type="flame">
    <h3 class= "sensor__name sensor__name--warning">{{ $sensor->name . " (" . $sensor->topic . ")"}}</h3>
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
    @include('dashboard.sensor.editSection')

</article>

@elseif($sensorValue>=0) {{--  Fire detected. This is not fine. --}}
<article class="sensor sensor--alert" data-type="flame">
    <h3 class= "sensor__name sensor__name--warning">{{ $sensor->name . " (" . $sensor->topic . ")"}}</h3>
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
    @include('dashboard.sensor.editSection')

</article>


@else {{--  Incorrect value. --}}
<article class="sensor" data-type="flame">
    <h3 class= "sensor__name sensor__name--warning">{{ $sensor->name . ", (" . $sensor->topic . ")"}}</h3>
    <section class="sensor__readout">
        <figure class="sensor__figure">
            <img src="/icon/fire.png" alt="A flame in black and white." class="sensor__img">
        </figure>
        <section class="sensor__value u-flex-center">
            <p>No correct sensor value detected. Check DB directly.</p>
        </section>
    </section>
    @include('dashboard.sensor.editSection')
</article>
@endif