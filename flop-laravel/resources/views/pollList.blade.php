@foreach ($sondage as $poll)
    <form method="POST" action="{{route('poll.destroy', $poll->id)}}" accept-charset="UTF-8">
        @csrf
        @method('DELETE')
    <p>{{$poll->title}}</p>
    <p>{{$poll->description}}</p>
    <label>
        <input type="radio" name="option" value="{{ $index }}">
        {{ $reponse->title }}
    </label>
    <br>
    <button type="submit">Supprimer</button>
    </form>
@endforeach