@extends("template")
@section('css')
<link rel="stylesheet" href="{{asset('css/admin_dashboard.css')}}">
@endsection
@section('content')
@section('title')
<title>Vote</title>

@vite('resources/js/vote.js')

@endsection

@section('header')
<h1 class="page-header"><a href="">Vote</a></h1>
@endsection

@section('contenu')

<!-- Vérification côté serveur si jamais la personne a desactivé JavaScript -->
@if ($duree > 0)

<form method="post" action="{{route('answer.store')}}" accept-charset="UTF-8">
        @csrf
<!-- Réalisation de 3 champs de formulaires écrit -->
<!-- Question sur une durée type number -->
<p id="alert" style="display:none;">Pas de sondage disponible</p>
<div class="sondage">
<p>Durée du sondage</p>
<p id="duree" style="display:none;">{{$duree}}</p>

<p>{{$question}}</p>

@foreach($reponses as $reponse)
<label>{{$reponse->answer}} 
    @if($reponse->artist)- {{$reponse->artist}} 
    @endif
<input type="radio" name="answers[]" value="{{$reponse->id}}">
<img src="{{$reponse->picture}}" alt="{{$reponse->artist}}" width="200px">
</label>
<br>
@endforeach

<input type="submit" value="Valider">
</form>
</div>

@else
<p>Pas de sondage disponible</p>
@endif
@endsection