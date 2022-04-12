@extends('baseview')
@section('title', 'Index')
@include('components/header')


<main class="main">
    <section class="room-section"> <!-- Allrooms -->
        @forelse ($rooms as $room )
            @include('dashboard.room')
        @empty
            <h1>No rooms added to database.</h1>
        @endforelse
    </section>
</main>

@include('components/sidebar')