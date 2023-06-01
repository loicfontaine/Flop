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
      <div class="form-group {!! $errors->has('firstname') ? 'has-error' :'' !!}">
        <input class='inscription border-placeholder' type="text" name="firstname" v-model="firstname">
        <span class='placeholder-haut FontInter'>Prénom</span>
        {!! $errors->first('firstname', '<small class="help-block">:message</small>') !!}
      </div>
      <div class="form-group {!! $errors->has('lastname') ? 'has-error' :'' !!}">
        <input class='inscription border-placeholder' type="text" name="lastname" v-model="lastName">
        <span class='placeholder-haut FontInter'>Nom</span>
        {!! $errors->first('lastname', '<small class="help-block">:message</small>') !!}
      </div>
      <div class="form-group {!! $errors->has('nickname') ? 'has-error' :'' !!}">
        <input class='inscription border-placeholder' type="text" name="nickname" v-model="nickname">
        <span class='placeholder-haut FontInter'>Nom d'utilisateur*</span>
        {!! $errors->first('nickname', '<small class="help-block">:message</small>') !!}
      </div>
      <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
      <input type="email" name="email" placeholder="Email" class="inscription border-placeholder form-control">
      {!! $errors->first('email', '<small class="helpblock">:message</small>') !!}
      </div>
      <div class="form-group {!! $errors->has('phone_number') ? 'has-error' :'' !!}">
        <input class='inscription border-placeholder' type="tel" name="phone_number" v-model="phone_number">
        <span class='placeholder-haut FontInter'>Numéro de téléphone</span>
        {!! $errors->first('phone_number', '<small class="help-block">:message</small>') !!}
      </div>
      <div class="form-group {!! $errors->has('password') ? 'has-error' :'' !!}">
        <input class='inscription border-placeholder' type="password" name="password" v-model="password">
        <span class='placeholder-haut FontInter'>Mot de passe*</span>
        {!! $errors->first('password', '<small class="help-block">:message</small>') !!}
      </div>
      <div class="form-group {!! $errors->has('address') ? 'has-error' :'' !!}">
        <input class='inscription border-placeholder' type="text" name="address" v-model="address">
        <span class='placeholder-haut FontInter'>Adresse</span>
        {!! $errors->first('address', '<small class="help-block">:message</small>') !!}
    </div>
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


