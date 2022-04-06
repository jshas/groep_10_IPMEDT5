@extends('baseview')
@include('components.header')
<main class="dashboard">
    <section class="room-section">
        @include('dashboard.room')
    </section>
</main>
@include('components.sidebar')