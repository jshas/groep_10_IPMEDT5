@extends('baseview')
@section('title', 'Edit ' . $room->name .  ' Room')
@include('components.header')
<main class="main main--edit">

    <article class="form u-flex-center"  data-room={{$room }}>
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
                <section class="form__description"> 
                    <h3>Room grid editor</h3>
                    <p>Toggle the checkboxes to fill in a respresentation of your room contents, such as chairs or desks.
                    </p>
                </section>
                <section class="form__buttons">
                    <button type="button" class="form__button" id="js--openCreateGrid">Open grid</button>
                    <button type="button" class="form__button" id="js--closeCreateGrid">Close grid</button>
                    <button type="button" class="form__button" id="js--resetCreateGrid">Reset grid</button>
                </section>

                    <article class="form-grid" id="js--roomGrid">
                        <label for="layout[]" class="form-grid__label">Choose your room layout:</label>
                        @for ($i = 0; $i < 100; $i++)
                            <input
                            type="checkbox"
                            class="form-grid__checkbox" 
                            id={{ 'js--gridItem-' . $i }} 
                            name="layout[]"
                            data-status="empty"
                            data-coordinate={{ $i }}
                            value={{ $i }}
                            checked="" >
                    @endfor
                    </article>
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
@section('additional-js-scripts')
<script defer> 
    let currentRoom = {{ Js::from($room) }};
</script>
    <script src="/js/createRoom.js" defer></script>
    <script src="/js/editRoom.js" defer></script>
@endsection