<!-- Vérification côté serveur si jamais la personne a desactivé JavaScript -->
<form method="post" action="{{route('answer.store')}}" accept-charset="UTF-8">
        @csrf
<div class="sondage">
<p>Durée du sondage</p>
<p id="duree">{{$timeLeft}}</p>

<p>{{$dernierSondage->title}}</p>
<p>{{$dernierSondage->description}}</p>

for ($i = 0; $i < count($reponses); $i++) {
    <label>
        <input type="radio" name="option" value="{{ $i }}">
        {{ $reponses[$i]->title }}
    </label>
    <br>
}

<input type="submit" value="Valider">
</form>
</div>