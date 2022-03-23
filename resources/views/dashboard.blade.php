@extends('baseview')
@section('title', 'Dashboard')

<header class="page-header">
    <h1 class="page-header__heading">Fire Detection System</h1>
</header>

<main class="dashboard">
    {{--  --}}
    <section class="room-section"> <!-- Allrooms -->

    <article class="room"> <!-- All sensors per room -->
    <button class="temp__button"><a href="/room">Klik me bitch</a></button>
            <header class="room__header">
                <h2 class="room__heading">Master Bedroom</h2>
            </header>
            
            <section class="room__sensors">
            <article class="sensor">
                    <h3 class= "sensor__name">North-Temp-1</h3>
                    <section class="sensor__readout">
                        <figure class="sensor__figure">
                            <img src="/icon/thermometer.png" alt="Black and white icon of a thermometer placed on a sun icon." class="sensor__img">
                        </figure>
                        <p class="sensor__value u-flex-center">N/A &deg;C</p>
                    </section>
                </article></a>

                <article class="sensor">
                    <h3 class= "sensor__name">North-Flame-1</h3>
                    <section class="sensor__readout">
                        <figure class="sensor__figure">
                            <img src="/icon/fire.png" alt="Black and white icon of a thermometer placed on a sun icon." class="sensor__img">
                        </figure>
                        <section class="sensor__value u-flex-center">
                            <figure class="sensor__figure">
                                <img src="/icon/cross.png" alt="A cross, signifying danger." class="sensor__img">
                            </figure>
                            {{-- <figure class="sensor__figure">
                                <img src="/icon/check.png" alt="A check, signifying safety." class="sensor__img">
                            </figure> --}}
                        </section>
                    </section>
                </article>

    
    
            </section>
                            </article>

        <article class="room"> <!-- All sensors per room -->
            <header class="room__header">
                <h2 class="room__heading">Living Room</h2>
            </header>

            <section class="room__sensors">
                <article class="sensor">
                    <h3 class= "sensor__name">North-Temp-1</h3>
                    <section class="sensor__readout">
                        <figure class="sensor__figure">
                            <img src="/icon/thermometer.png" alt="Black and white icon of a thermometer placed on a sun icon." class="sensor__img">
                        </figure>
                        <section class="sensor__value u-flex-center"><p>N/A &deg;C</p></section>
                    </section>
                </article>

                <article class="sensor">
                    <h3 class= "sensor__name">North-Flame-1</h3>
                    <section class="sensor__readout">
                        <figure class="sensor__figure">
                            <img src="/icon/fire.png" alt="Black and white icon of a thermometer placed on a sun icon." class="sensor__img">
                        </figure>
                        <section class="sensor__value u-flex-center">
                            {{-- <figure class="sensor__figure">
                                <img src="/icon/cross.png" alt="A cross, signifying danger." class="sensor__img">
                            </figure> --}}
                            <figure class="sensor__figure">
                                <img src="/icon/check.png" alt="A check, signifying safety." class="sensor__img">
                            </figure>
                        </section>
                    </section>
                </article>
            </section>
        </article>

    </section>


</main>
