@extends('template')
@section('css')
<link rel="stylesheet" href="{{asset('css/inscription.css')}}">
@endsection
@section('js')
<script src="{{asset('js/inscription.js')}}"></script>
@section('content')
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

@foreach ({{$questions}} as $question) 
    <label>{{$question->question}}</label>
        <input type="radio" name="questions[]" value="{{$question->id}}">
    </label>
@endforeach

<input type="submit" value="Valider">
</form>
</div>

@endsection