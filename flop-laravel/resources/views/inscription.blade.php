@extends('template')
@section('css')
<link rel="stylesheet" href="{{asset('css/inscription.css')}}">
@endsection
@section('js')
<script src="{{asset('js/inscription.js')}}"></script>
@section('content')
<div class='FontInter'>
  <h1 class='titre'>Inscription</h1>
  <hr id='separation'>
  <div class='input-container'>
    <form method="POST" action="{{route('user.store')}}" accept-charset="UTF-8">
    @csrf
      <input class='inscription border-placeholder' type="text" name="firstname" v-model="firstName">
      <span class='placeholder-haut FontInter'>Prénom</span>
      <input class='inscription border-placeholder' type="text" name="lastname" v-model="lastName">
      <span class='placeholder-haut FontInter'>Nom</span>
      <input class='inscription border-placeholder' type="text" name="nickname" v-model="username">
      <span class='placeholder-haut FontInter'>Nom d'utilisateur*</span>
      <input class='inscription border-placeholder' type="email" name="email" v-model="email">
      <span class='placeholder-haut FontInter'>Adresse e-mail*</span>
      <input class='inscription border-placeholder' type="tel" name="phone-number" v-model="phone">
      <span class='placeholder-haut FontInter'>Numéro de téléphone</span>
      <input class='inscription border-placeholder' type="password" name="password" v-model="password">
      <span class='placeholder-haut FontInter'>Mot de passe*</span>
      <input class='inscription border-placeholder' type="text" name="address" v-model="address">
      <span class='placeholder-haut FontInter'>Adresse</span>
      <div class='basForm'>
        <div class='condition'>
          <label class='checkbox'>
            J'accepte les conditions d'utilisation
            <input type="checkbox" class='checkbox-round' v-model="checkedOptions" value="option1">
          </label>
          <hr class='separation2'>
          <label class='checkbox'>
            J'accepte la charte de confidentialité
            <input type="checkbox" class='checkbox-round' v-model="checkedOptions" value="option1">
          </label>
          <hr class='separation2'>
      </div>
        <button type="submit" class='submit'>S'inscrire</button>
    </form>
  </div>
</div>

<div class='FontInter compte'>
      <p class='p1'>Vous avez déjà un compte ? <a href='connexion' class='p2'>Connectez-vous</a></p>
      <p class='p1'>ou</p>
      <div class='bouton FontInter'>
        <button class='apple'>Connexion avec Apple</button>
        <button class='facebook'>Connexion avec Facebook</button>
        <button class='google'>Connexion avec Google</button>
      </div>
</div>


<!--
  <script>
    export default {
      data() {
        return {
          firstName: '',
          lastName: '',
          username: '',
          email: '',
          phone: '',
          password: '',
          address: '',

        };
      },
      methods: {
        submitForm() {
          // Traitement de la soumission du formulaire ici (par exemple, appel à une API Laravel)
        }
      }
    };
  </script>
  -->
  @endsection

    
      
<!--
    <script>
  export default {
    data() {
      return {
        firstName: '',
        lastName: '',
        username: '',
        email: '',
        phone: '',
        password: '',
        address: '',
        
      };
    },
    methods: {
      submitForm() {
        // Traitement de la soumission du formulaire ici (par exemple, appel à une API Laravel)
      }
    }
  };
  </script> -->


