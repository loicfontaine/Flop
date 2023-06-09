<!-- Vérification côté serveur si jamais la personne a desactivé JavaScript -->
<form method="post" action="{{route('answer.store')}}" accept-charset="UTF-8">
        @csrf
<div class="sondage">
<p id="duree">Il vous reste {{$timeLeft}} minutes pour participer au sondage</p>

<h1>{{$dernierSondage->title}}</h1>
<p>{{$dernierSondage->description}}</p>
<p>Choix:</p>

@for ($i = 0; $i < count($reponses); $i++)
    <label>Option {{ $i }}</label>
      <div id="conteneur-options">
        <input type="radio" name="options[]" value="{{ $i }}" required>
        {{ $reponses[$i]->title }}
      </div>
      <br>
@endfor

<input type="submit" value="Valider">
</form>
</div>