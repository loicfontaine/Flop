<!-- Vérification côté serveur si jamais la personne a desactivé JavaScript -->
<form method="post" action="{{route('answer.store')}}" accept-charset="UTF-8">
        @csrf
<div class="sondage">
<p>Durée du sondage</p>
<p id="duree">{{$duration}}</p>

<p>{{$title}}</p>
<p>{{$description}}</p>

@foreach ($reponses as $index => $reponse)
    <label>
        <input type="radio" name="option" value="{{ $index }}">
        {{ $reponse->title }}
    </label>
    <br>
@endforeach

<input type="submit" value="Valider">
</form>
</div>