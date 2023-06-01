@extends('template')
@section('css')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

@endsection
@section('content')

<div class='FontInter'>

    <hr id='separation'>

    <div class="text-image-container">
        <p class="left-text">Bonjour utilisateur1 !</p>
        <img class="right-image" src="img/notification.svg" alt="Image">
    </div>

    <div class='input-container'>
        <div class='FontInterBlack'>
            <h2 class='titreNombreDeColorCoins'>ColorCoins</h2>
        </div>
        <img src="img/Icone-ColorCoins.png" class="ColorCoinsImage">
        <div class="FontInterBlack">
            <h2 class="nombreDeColorCoins">75</h2>
        </div>
    </div>


    <div class="input-options">
        <div class="input-button">
            <div class="column">
                <button class="centrage" href="">
                    <img class="imageDansBouton" src="img/accueil.svg" alt="Image bouton">
                    <span>Accueil</span>
                </button>
                <button class="centrageSpecial" href="">
                    <img src="img/boutique.svg" alt="Image bouton">
                    <span>Boutique</span>
                </button>
                <button class="centrage" href="">
                    <img src="img/participation.svg" alt="Image bouton">
                    <span>Participations</span>
                </button>
            </div>
            <div class="column">
                <button class="centrage" href="">
                    <img src="img/rewind.svg" alt="Image bouton">
                    <span>Rewind</span>
                </button>
                <button class="centrage" href="">
                    <img src="img/live.svg" alt="Image bouton">
                    <span>Live</span>
                </button>
                <button class="centrage" href="">
                    <img src="img/réglage.svg" alt="Image bouton">
                    <span>Réglages</span>
                </button>
            </div>
        </div>
    </div>
    <div></div>

    @endsection