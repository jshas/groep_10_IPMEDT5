@extends('baseview')
@include('components/sidebar')
@include('components/header')
@section('title', 'Dashboard')

<section class="room__detailed">
<header class="room__header">
        <h2 class="room__heading">Dit is een kamer</h2>
    </header>
    <div class="room__grid">
        <div class="grid-item">1</div>
  <div class="grid-item">2</div>
  <div class="grid-item">3</div>
  <div class="grid-item">4</div>
  <div class="grid-item">5</div>
  <div class="grid-item">6</div>
  <div class="grid-item">7</div>
  <div class="grid-item">8</div>
  <div class="grid-item">9</div>
    </div>
<section class="room__sensors">        
@foreach($room->sensors as $sensor)
            @include('dashboard.sensor')
        @endforeach
    </section>
  
    </section>