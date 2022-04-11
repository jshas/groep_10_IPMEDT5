@extends('baseview')
@section('title', 'Edit ' . $room->name .  ' Room')
@include('components.header')
<main class="main">
    <article class="form u-flex-center">
        {{-- <form class="form__form" action="{{ route('rooms.update' , $room->id) }}" method="POST"> --}}
        <form class="form__form" action="/rooms/{{ $room->id }}"  method="POST">
            @csrf
            @method('PATCH')
            <h2 class="form__header">Edit {{ $room->name }} Room </h2>
            <section class="form__description">
                <p>This form is used to edit an existing room.</p>
            <section class="form__section">
                <label class="form__label" for="name">Name</label>
               <input class="form__input @error('name') form__input--error @enderror" id="name" placeholder="Name of the room (e.g: Basement)." name="name" type="text" value="{{ old('name') }}">
                @if ($errors->get('name'))
                    <section class="form__alert">
                        @foreach ($errors->get('name') as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </section>
                @endif    
            </section>



            <section class="form__section">
                <button class="form__button type="submit"}>Edit Room</button>

            </section>
        </form>

        <article class="table  u-flex-center">
            <table class="table__table">
                <tr class="table__row">
                    <th class="table__header">Current name</th>
                </tr>
                    <tr class="table__row">
                        <td class="table__">{{ $room->name  }}</td>
                    </tr>

            </table>
        </article>

    </article>
</main>
@include('components.sidebar')