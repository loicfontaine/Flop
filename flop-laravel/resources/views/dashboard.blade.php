@extends('template')
@section('css')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

@endsection
@section('content')
@if (Auth::check())
<div class='authentificated FontInter'>
    <hr id='separation'>
    <div class="text-image-container">
        <p class="left-text whiteInter">Bonjour {{Auth::user()->firstname}} !</p>
        <div class="item">
            <svg width="25" height="25" id='notification' viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.4273 15.0727L20.3125 12.9578V10.1562C20.3101 8.22019 19.5899 6.35379 18.2911 4.91795C16.9924 3.48212 15.2074 2.57885 13.2812 2.38281V0.78125H11.7188V2.38281C9.79264 2.57885 8.00763 3.48212 6.70888 4.91795C5.41014 6.35379 4.68992 8.22019 4.6875 10.1562V12.9578L2.57266 15.0727C2.42613 15.2191 2.34379 15.4178 2.34375 15.625V17.9688C2.34375 18.176 2.42606 18.3747 2.57257 18.5212C2.71909 18.6677 2.9178 18.75 3.125 18.75H8.59375V19.357C8.57676 20.3482 8.9261 21.3107 9.57483 22.0602C10.2236 22.8097 11.1261 23.2934 12.1094 23.4188C12.6525 23.4726 13.2009 23.4122 13.7192 23.2414C14.2376 23.0706 14.7144 22.7932 15.1192 22.4271C15.5239 22.0609 15.8475 21.6141 16.0691 21.1154C16.2908 20.6166 16.4056 20.077 16.4062 19.5312V18.75H21.875C22.0822 18.75 22.2809 18.6677 22.4274 18.5212C22.5739 18.3747 22.6562 18.176 22.6562 17.9688V15.625C22.6562 15.4178 22.5739 15.2191 22.4273 15.0727ZM14.8438 19.5312C14.8438 20.1529 14.5968 20.749 14.1573 21.1885C13.7177 21.6281 13.1216 21.875 12.5 21.875C11.8784 21.875 11.2823 21.6281 10.8427 21.1885C10.4032 20.749 10.1562 20.1529 10.1562 19.5312V18.75H14.8438V19.5312ZM21.0938 17.1875H3.90625V15.9484L6.02109 13.8336C6.16762 13.6871 6.24996 13.4884 6.25 13.2812V10.1562C6.25 8.49865 6.90848 6.90894 8.08058 5.73683C9.25268 4.56473 10.8424 3.90625 12.5 3.90625C14.1576 3.90625 15.7473 4.56473 16.9194 5.73683C18.0915 6.90894 18.75 8.49865 18.75 10.1562V13.2812C18.75 13.4884 18.8324 13.6871 18.9789 13.8336L21.0938 15.9484V17.1875Z" fill="white" />
            </svg>
            <svg width="23" height="23" id="logout" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.9127 0.014389C20.8889 0.0124588 20.8687 0 20.8438 0H10.5417C8.95667 0 7.66675 1.28992 7.66675 2.875V3.83327C7.66675 4.36234 8.09596 4.79173 8.62502 4.79173C9.15408 4.79173 9.5833 4.36234 9.5833 3.83327V2.875C9.5833 2.34699 10.0136 1.91673 10.5417 1.91673H15.0066L14.7142 2.01447C13.9381 2.28277 13.4167 3.01398 13.4167 3.83327V18.2083H10.5417C10.0136 18.2083 9.5833 17.778 9.5833 17.25V15.3333C9.5833 14.8044 9.15408 14.375 8.62502 14.375C8.09596 14.375 7.66675 14.8044 7.66675 15.3333V17.25C7.66675 18.8351 8.95667 20.125 10.5417 20.125H13.4167V21.0833C13.4167 22.1403 14.2762 23 15.3333 23C15.5384 23 15.733 22.9703 15.9438 22.9051L21.7015 20.9855C22.4787 20.7172 23 19.986 23 19.1667V1.91673C23 0.799294 22.0368 -0.076683 20.9127 0.014389Z" fill="white" />
                <path d="M10.2608 8.90553L6.42751 5.07226C6.15342 4.79817 5.7414 4.71569 5.3829 4.86432C5.02546 5.01277 4.79173 5.36267 4.79173 5.74977V8.62477H0.958275C0.42939 8.62477 0 9.05416 0 9.58305C0 10.1121 0.42939 10.5415 0.958275 10.5415H4.79173V13.4165C4.79173 13.8036 5.02546 14.1533 5.3829 14.302C5.7414 14.4504 6.15342 14.3681 6.42751 14.094L10.2608 10.2606C10.6356 9.88592 10.6356 9.28035 10.2608 8.90553Z" fill="white" />
            </svg>
        </div>
    </div>
    <div class='input-container blackInter'>
        <h2 class='titreNombreDeColorCoins'>ColorCoins</h2>
        <img src="img/Icone-ColorCoins.png" class="ColorCoinsImage">
        <h2 class="nombreDeColorCoins">{{Auth::user()->color_coins}}</h2>
        <button id='boutique' type='submit'>Visiter la boutique</button>
    </div>


    <div class="centre">
        <div id="informations">
            <div id="titre">
                <h1 class="title">Mes informations</h1>
                <bouton class="bouton" id="bouton-modifier">Modifier</bouton>
            </div>
            <div id="container-infos">
                <div class="bloc">
                    <h1>E-mail</h1>
                    <p>{{Auth::user()->email}}</p>
                </div>
                <hr>
                <div class="bloc">
                    <h1>Prénom</h1>
                    <p>{{Auth::user()->firstname}}</p>
                </div>
                <hr>
                <div class="bloc">
                    <h1>Nom</h1>
                    <p>{{Auth::user()->lastname}}</p>
                </div>
                <hr>
                <div class="bloc">
                    <h1>Adresse</h1>
                    <p>{{Auth::user()->address}}</p>
                </div>
                <hr>
                <div class="bloc">
                    <h1>Numéro de téléphone</h1>
                    <p>{{Auth::user()->phone_number}}</p>
                </div>
            </div>
            <form method="POST" id="container-modif-infos" action="{{route('user.update', [Auth::user()->id])}}" class="hidden" accept-charset="UTF-8">
                @csrf
                <div class="bloc">
                    <h1>E-mail</h1>
                    <input type="text" name="email" value="{{Auth::user()->email}}">
                </div>
                <hr>
                <div class="bloc">
                    <h1>Prénom</h1>
                    <input type="text" name="firstname" value="{{Auth::user()->firstname}}">
                </div>
                <hr>
                <div class="bloc">
                    <h1>Nom</h1>
                    <input type="text" name="lastname" value="{{Auth::user()->lastname}}">
                </div>
                <hr>
                <div class="bloc">
                    <h1>Adresse</h1>
                    <input type="text" name="address" value="{{Auth::user()->address}}">
                    <hr>
                </div>
                <div class="bloc">
                    <h1>Numéro de téléphone</h1>
                    <input type="text" name="phone_number" value="{{Auth::user()->phone_number}}">
                </div>
                <button class="bouton" type="submit" id="bouton-valider">Valider</button>
            </form>
        </div>

        <div id="participation">
            <h1 class="title">Mes participations</h1>
            <div id="container-participation">
                <div class="entete">
                    <h1>Challenge</h1>
                    <p>08.06.2023</p>
                </div>
                <div class="row">
                    <div class="description">
                        <h2>Nom concours</h2>
                        <p>description blablablablablablabla</p>
                    </div>
                    <div class="coins">
                        <p>60</p>
                        <svg class="cc" xmlns="http://www.w3.org/2000/svg" class="cc" viewBox="0 0 1061.26 1061.27">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #fff;
                                    }

                                    .cls-2 {
                                        fill: #e84a97;
                                    }

                                    .cls-3 {
                                        fill: #7cf5ac;
                                    }
                                </style>
                            </defs>
                            <g id="Calque_1-2">
                                <path class="cls-1" d="m530.34,80.55c-250.04,0-452.74,202.68-452.74,452.71s202.7,452.74,452.74,452.74,452.71-202.7,452.71-452.74S780.37,80.55,530.34,80.55Zm.29,102.68v144.44c-34.7.34-64.05,22.95-74.47,54.2l-138.63-45.02c29.69-89.25,113.87-153.62,213.1-153.62Zm0,692.32c-123.13,0-222.95-99.81-222.95-222.92,0-23.99,3.8-47.04,10.8-68.69l137.6,44.7c-2.58,7.8-3.96,16.11-3.96,24.76,0,43.8,35.5,79.3,79.28,79.3s79.28-35.5,79.28-79.3c0-11.86-2.6-23.14-7.3-33.25-12.55-27.16-40.06-46.03-71.98-46.03-.27,0-.5,0-.77.03v-144.44c25.21,0,49.48,4.19,72.09,11.91,47.75,16.32,88.19,48.37,115.14,90,22.58,34.86,35.69,76.41,35.69,121.01,0,123.11-99.81,222.92-222.92,222.92Z" />
                                <path class="cls-2" d="m530.63,0C237.56,0,0,237.57,0,530.64s237.56,530.63,530.63,530.63,530.63-237.56,530.63-530.63S823.67,0,530.63,0Zm-.29,986c-250.04,0-452.74-202.7-452.74-452.74S280.3,80.55,530.34,80.55s452.71,202.68,452.71,452.71-202.68,452.74-452.71,452.74Z" />
                                <path class="cls-3" d="m530.63,183.23v144.44c-34.7.34-64.05,22.95-74.47,54.2l-138.63-45.02c29.69-89.25,113.87-153.62,213.1-153.62Z" />
                                <path class="cls-3" d="m753.55,652.63c0,123.11-99.81,222.92-222.92,222.92s-222.95-99.81-222.95-222.92c0-23.99,3.8-47.04,10.8-68.69l137.6,44.7c-2.58,7.8-3.96,16.11-3.96,24.76,0,43.8,35.5,79.3,79.28,79.3s79.28-35.5,79.28-79.3c0-11.86-2.6-23.14-7.3-33.25-12.55-27.16-40.06-46.03-71.98-46.03-.27,0-.5,0-.77.03v-144.44c25.21,0,49.48,4.19,72.09,11.91,47.75,16.32,88.19,48.37,115.14,90,22.58,34.86,35.69,76.41,35.69,121.01Z" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<script>
    var bouton = document.getElementById('boutique');
    bouton.addEventListener('click', function() {
        window.location.href = "boutique";
    });

    var bouton6 = document.getElementById('logout');
    {
        bouton6.addEventListener('click', function() {
            window.location.href = "logout";
        });
    }

    var divContainerInfos = document.getElementById('container-infos');
    var divContainerModif = document.getElementById('container-modif-infos');
    var btnModifier = document.getElementById('bouton-modifier');

    btnModifier.addEventListener('click', function() {
        divContainerInfos.style.display = "none";
        divContainerModif.style.display = "block";
        btnModifier.style.display = "none";
    });
</script>
@endsection