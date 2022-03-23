@extends('baseview')
@section('title', 'Dashboard')

<header class="page-header">
    <h1 class="page-header__heading">Fire Detection System</h1>
</header>

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
