@foreach ($sondage as $poll)
    <form method="POST" action="{{route('poll.destroy', $poll->id)}}" accept-charset="UTF-8">
        @csrf
    <p>{{$poll->title}}</p>
    <p>{{$poll->description}}</p>
    <br>
    @foreach ($reponses as $index => $reponse)
    <label>
        <input type="radio" name="option" value="{{ $index }}">
        {{ $reponse->title }}
    </label>
    <br>
@endforeach
    <button type="submit">Supprimer</button>
    </form>
@endforeach