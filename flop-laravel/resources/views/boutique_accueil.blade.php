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
            @if (Auth::check())
            <h2 class="nombreDeColorCoins black">{{Auth::user()->color_coins}} </h2>
            @else 
            <h2 class="nombreDeColorCoins black">0</h2>
            @endif
    </div>
    
        <button id='compte'>Voir mon compte</button>
</div>
<div class="centre">
    <div class="column-container">
        @foreach($articles as $article)
        <div class='column-item'>
            <div class='item'>
                <img src="public/img/articles/{{$article->image}}" class='img-item'>
                <h1 class='item-title'>{{$article->name}}</h1>
                <div class='item-price'>
                    <h1 class='price'>{{$article->price}}</h1>
                    <img src="img/Icone-ColorCoins.png" class='cc'>  
                </div>
            </div>
        </div>
@endforeach

        <!-- <div class='column-item'>
            <div class='item'>
                <img src="img/stickers.png" class='img-item'>
                <h1 class='item-title'>Stickers</h1>
                <div class='item-price'>
                    <h1 class='price'>75</h1>
                    <img src="img/Icone-ColorCoins.png" class='cc'>  
                </div>
            </div>
        </div>
        <div class='column-item'>
            <div class='item'>
                <img src="img/casque.png" class='img-item'>
                <h1 class='item-title'>Casque</h1>
                <div class='item-price'>
                    <h1 class='price'>75</h1>
                    <img src="img/Icone-ColorCoins.png" class='cc'>  
                </div>
            </div>
        </div>
        <div class='column-item'>
            <div class='item'>
                <img src="img/casquette.png" class='img-item'>
                <h1 class='item-title'>Casquette</h1>
                <div class='item-price'>
                    <h1 class='price'>75</h1>
                    <img src="img/Icone-ColorCoins.png" class='cc'>  
                </div>
            </div>
        </div>
        <div class='column-item'>
            <div class='item'>
                <img src="img/iphone.png" class='img-item'>
                <h1 class='item-title'>Casque</h1>
                <div class='item-price'>
                    <h1 class='price'>75</h1>
                    <img src="img/Icone-ColorCoins.png" class='cc'>  
                </div>
            </div>
        </div>
        <div class='column-item'>
            <div class='item'>
                <img src="img/tshirt.png" class='img-item'>
                <h1 class='item-title'>Casque</h1>
                <div class='item-price'>
                    <h1 class='price'>75</h1>
                    <img src="img/Icone-ColorCoins.png" class='cc'>  
                </div>
            </div>
        </div> -->
    </div>
</div>

<script>
        var bouton = document.getElementById('compte');
        bouton.addEventListener('click', function() {
          window.location.href = "dashboard";
        });
</script>

@endsection