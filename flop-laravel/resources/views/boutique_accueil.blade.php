@extends('template')
@section('css')
<link rel="stylesheet" href="{{asset('css/boutique_accueil.css')}}">
@endsection
@section('content')
<div class='FontInter header' >
    <hr class='separation'>
    <h1 class='titre'>Bienvenu.e sur la boutique</h1>
    <div class='input-container'>
            <h2 class='titreNombreDeColorCoins black'>ColorCoins</h2>
        <img src="img/Icone-ColorCoins.png" class="ColorCoinsImage">
            <h2 class="nombreDeColorCoins black">75</h2>
    </div>
        <button id='compte'>Voir mon compte</button>
</div>
<div class="centre">
    <div class="column-container">
        <div class='column-item'>
        <div class='item'>
            <img src="img/badges.png" class='img-item'>
                <p>Item 1</p>
            </div>
        </div>
        <div class='column-item'>
        <div class='item'>
            <img src="img/stickers.png" class='img-item'>
                <p>Item 1</p>
            </div>
        </div>
        <div class='column-item'>
        <div class='item'>
            <img src="img/casque.png" class='img-item'>
                <p>Item 1</p>
            </div>
        </div>
        <div class='column-item'>
        <div class='item'>
            <img src="img/casquette.png" class='img-item'>
                <p>Item 1</p>
            </div>
        </div>
    </div>
</div>

@endsection