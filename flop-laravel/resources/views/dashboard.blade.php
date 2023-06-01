@extends('template')
@section('css')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

@endsection
@section('content')

<div class='FontInter'>

    <hr id='separation'>

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

        <div class="input-options">
            <div class="input-button">
                <div class="column">
                    <button href="">
                        <img src="chemin/vers/votre/image.png" alt="Image bouton">Accueil
                    </button>
                    <button href="">
                        <img src="chemin/vers/votre/image.png" alt="Image bouton">Boutique
                    </button>
                    <button href="">
                        <img src="chemin/vers/votre/image.png" alt="Image bouton">Participations
                    </button>
                </div>
                <div class="column">
                    <button href="">
                        <img src="chemin/vers/votre/image.png" alt="Image bouton">Rewind
                    </button>
                    <button href="">
                        <img src="chemin/vers/votre/image.png" alt="Image bouton">Live
                    </button>
                    <button href="">
                        <img src="chemin/vers/votre/image.png" alt="Image bouton">Réglages
                    </button>
                </div>
            </div>
        </div>


        @endsection