
@extends('baseview')
@include('components/header')
@include('components/sidebar')
@section('title', 'Dashboard')



<main class="dashboard">
    <section class="room-section"> <!-- Allrooms -->
        @if($rooms)
            @foreach ($rooms as $room )
                @include('dashboard.room')
            @endforeach
        @else
            <h1>No rooms added to database.</h1>
        @endif
    </section>
</main>
