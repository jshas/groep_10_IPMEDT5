<section class="sensor__buttons sensor__buttons--edit">
    <a class="sensor__button" href="{{'/sensors/' . $sensor->id . '/edit'}}">Edit</a>
    <form class="sensor__form" action="{{ url('/sensor', ['id' => $sensor->id]) }}" method="post">
        <input class="sensor__button" type="submit" value="Delete" />
        @method('delete')
        @csrf
    </form>
</section>