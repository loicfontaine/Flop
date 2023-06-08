@section('contenu')
<!-- Vérification côté serveur si jamais la personne a desactivé JavaScript -->
<form method="post" action="{{route('answer.store')}}" accept-charset="UTF-8">
        @csrf
<!-- Réalisation de 3 champs de formulaires écrit -->
<!-- Question sur une durée type number -->
<div class="sondage">
<p>Durée du sondage</p>
<p id="duree" style="display:none;">{{$duration}}</p>

<p>{{$title}}</p>
<p>{{$description}}</p>

@foreach($options as $option)
<label>{{$reponse->option}}</label>
<input type="radio" name="options[]" value="{{$option->id}}">
</label>
<br>
@endforeach

<input type="submit" value="Valider">
</form>
</div>

@endsection