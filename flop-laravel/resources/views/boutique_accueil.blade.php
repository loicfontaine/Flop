@extends('template')
@section('css')
<link rel="stylesheet" href="{{asset('css/boutique_accueil.css')}}">
@endsection
@section('title')
Boutique | Couleur 3 Interact
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

    <div class="grid-container">
            @foreach($articles as $article)
                <div class='item'>
                <img src="img/articles/{{$article->image}}" class='img-item'>
                <h1 class='item-title FontMonserrat'>{{$article->name}}</h1>
                    <div class='item-price'>
                        <h1 class='price'>{{$article->price}}</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" class="cc" viewBox="0 0 1061.26 1061.27"><defs><style>.cls-1{fill:#fff;}.cls-2{fill:#e84a97;}.cls-3{fill:#7cf5ac;}</style></defs><g id="Calque_1-2"><path class="cls-1" d="m530.34,80.55c-250.04,0-452.74,202.68-452.74,452.71s202.7,452.74,452.74,452.74,452.71-202.7,452.71-452.74S780.37,80.55,530.34,80.55Zm.29,102.68v144.44c-34.7.34-64.05,22.95-74.47,54.2l-138.63-45.02c29.69-89.25,113.87-153.62,213.1-153.62Zm0,692.32c-123.13,0-222.95-99.81-222.95-222.92,0-23.99,3.8-47.04,10.8-68.69l137.6,44.7c-2.58,7.8-3.96,16.11-3.96,24.76,0,43.8,35.5,79.3,79.28,79.3s79.28-35.5,79.28-79.3c0-11.86-2.6-23.14-7.3-33.25-12.55-27.16-40.06-46.03-71.98-46.03-.27,0-.5,0-.77.03v-144.44c25.21,0,49.48,4.19,72.09,11.91,47.75,16.32,88.19,48.37,115.14,90,22.58,34.86,35.69,76.41,35.69,121.01,0,123.11-99.81,222.92-222.92,222.92Z"/><path class="cls-2" d="m530.63,0C237.56,0,0,237.57,0,530.64s237.56,530.63,530.63,530.63,530.63-237.56,530.63-530.63S823.67,0,530.63,0Zm-.29,986c-250.04,0-452.74-202.7-452.74-452.74S280.3,80.55,530.34,80.55s452.71,202.68,452.71,452.71-202.68,452.74-452.71,452.74Z"/><path class="cls-3" d="m530.63,183.23v144.44c-34.7.34-64.05,22.95-74.47,54.2l-138.63-45.02c29.69-89.25,113.87-153.62,213.1-153.62Z"/><path class="cls-3" d="m753.55,652.63c0,123.11-99.81,222.92-222.92,222.92s-222.95-99.81-222.95-222.92c0-23.99,3.8-47.04,10.8-68.69l137.6,44.7c-2.58,7.8-3.96,16.11-3.96,24.76,0,43.8,35.5,79.3,79.28,79.3s79.28-35.5,79.28-79.3c0-11.86-2.6-23.14-7.3-33.25-12.55-27.16-40.06-46.03-71.98-46.03-.27,0-.5,0-.77.03v-144.44c25.21,0,49.48,4.19,72.09,11.91,47.75,16.32,88.19,48.37,115.14,90,22.58,34.86,35.69,76.41,35.69,121.01Z"/></g></svg> 
                    </div>
                </div>
            @endforeach
    </div>


<script>
        var bouton = document.getElementById('compte');
        bouton.addEventListener('click', function() {
          window.location.href = "dashboard";
        });
</script>

@endsection