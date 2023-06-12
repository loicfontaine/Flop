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
      <form method="POST">
        <input class='connexion border-placeholder' type="text" v-model="e-mail">
        <span class='placeholder-haut FontInter'>E-mail</span>
        <input class='connexion border-placeholder' type="password" v-model="password">
        <span class='placeholder-haut FontInter'>Mot de passe</span>

        <div class='basForm'>
          <button type="submit" class='submit pointer'>Se connecter</button>
        </div>
      </form>
    </div>

    <hr class='separation3'>

    <div class='FontInter compte'>
      <h2 class='p1'>Pas encore de compte ?</h2>
      <button class="pointer" id='create'>Créer un compte</button>
      <span id='cc'>Gagne 25 ColorCoins</span>
      <h2 class='p1'>Ou</h2>
        <div class='bouton FontInter'>
        <button class='apple pointer'>Connexion avec Apple</button>
        <button class='facebook pointer'>Connexion avec Facebook</button>
        <button class='google pointer'>Connexion avec Google</button>
      </div>
    </div>

    
    <script>
        var bouton = document.getElementById('create');
        bouton.addEventListener('click', function() {
          window.location.href = "inscription";
        });
    </script>

    
      

   <!-- <script>
  export default {
    data() {
      return {
        username: '',
        password: '',

        
      };
    },
    methods: {
      submitForm() {
        // Traitement de la soumission du formulaire ici (par exemple, appel à une API Laravel)
      }

    }
  };
  </script> -->
  @endsection