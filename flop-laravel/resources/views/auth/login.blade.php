@extends('template')
@section('css')
<link rel="stylesheet" href="{{asset('css/connexion.css')}}">
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('js/connexion.js')}}"></script>
@endsection
@section('title')
Connexion | Couleur 3 Interact
@endsection
@section('content')
<div class='FontInter'>
    <h1 class='titre'>Connexion</h1>
    <hr class='separation'>
    <div class='input-container'>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input id="email" type="email" class="connexion border-placeholder form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <span class='placeholder-haut FontInter'>E-mail</span>
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong></span>
                                @enderror
                <input id="password" type="password" class="connexion border-placeholder form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <span class='placeholder-haut FontInter'>Mot de passe</span>
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class='basForm'>
                    <button type="submit" class='submit pointer'>Se connecter</button>
                </div>
            </form>
        </div>
    </div>
    <hr class='separation3'>
    <div class='FontInter compte'>
      <h2 class='p1'>Pas encore de compte ?</h2>
      <button id='create' class="pointer">Créer un compte</button>
      <span id='cc'>Gagne 25 ColorCoins</span>
      <h2 class='p1'>Ou</h2>
        <div class='bouton FontInter'>
            <button class='apple pointer'>Connexion avec Apple</button>
            <button class='facebook pointer'>Connexion avec Facebook</button>
            <button class='google pointer'>Connexion avec Google</button>
      </div>
    </div>
</div>
<script>
        var bouton = document.getElementById('create');
        bouton.addEventListener('click', function() {
          window.location.href = "inscription";
        });
    </script>
@endsection
