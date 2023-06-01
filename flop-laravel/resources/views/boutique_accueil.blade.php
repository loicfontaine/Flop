@extends('template')
@section('css')
<link rel="stylesheet" href="{{asset('css/boutique_accueil.css')}}">
@endsection
@section('content')
<div class=FontInter header>
    <h1 class='titre'>Bienvenu.e sur la boutique</h1>
    <div class='input-container'>
        <div class='FontInterBlack'>
            <h2 class='titreNombreDeColorCoins'>ColorCoins</h2>
        </div>
        <img src="img/Icone-ColorCoins.png" class="ColorCoinsImage">
        <div class="FontInterBlack">
            <h2 class="nombreDeColorCoins">75</h2>
        </div>
    </div>
    <div class='bouton'>
        <button id='compte'>Voir mon compte</button>
    </div>
</div>

@endsection