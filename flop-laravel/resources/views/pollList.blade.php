@foreach ($polls as $poll)
    <form method="POST" action="{{route('poll.destroy', $poll->id)}}" accept-charset="UTF-8">
        @csrf
        @method('DELETE')
    <h1>{{$poll->title}}</h1>
    <p>{{$poll->description}}</p>
    <br>
    <button type="submit">Supprimer</button>
    </form>
@endforeach