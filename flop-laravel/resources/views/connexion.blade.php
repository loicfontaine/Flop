@extends('template')
@section('css')
<link rel="stylesheet" href="{{asset('css/connexion.css')}}">
@endsection
@section('js')
<script src="{{asset('js/connexion.js')}}"></script>
@endsection
@section('content')
<div class='FontInter'>
    <h1 class='titre'>Connexion</h1>
    <hr class='separation'>

    <div class='input-container'>
      <form>
        <input class='connexion border-placeholder' type="text" v-model="username">
        <span class='placeholder-haut FontInter'>Nom d'utilisateur</span>
        <input class='connexion border-placeholder' type="password" v-model="password">
        <span class='placeholder-haut FontInter'>Mot de passe</span>

        <div class='basForm'>
          <button type="submit" class='submit'>Se connecter</button>
        </div>
      </form>
    </div>

    <hr class='separation3'>

    <div class='FontInter compte'>
      <h2 class='p1'>Pas encore de compte ?</h2>
      <button id='create'>Créer un compte</button>
      <span id='cc'>Gagne 25 ColorCoins</span>
      <h2 class='p1'>Ou</h2>
        <div class='bouton FontInter'>
        <button class='apple'>Connexion avec Apple</button>
        <button class='facebook'>Connexion avec Facebook</button>
        <button class='google'>Connexion avec Google</button>
      </div>
    </div>

    <!--
    <script>
        var bouton = document.getElementById('create');
        bouton.addEventListener('click', function() {
            
        });
    </script>
    -->
    
      

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