@extends('template')
@section('css')
<link rel="stylesheet" href="{{asset('css/emission.css')}}">
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('js/emission.js')}}"></script>
@endsection
@section('content') 
<div id='frame'>
    <div class='container-video'>
      <h1 class='titre'>Direct vidéo</h1>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/-XefQ9EYOmI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <h2 class='titre2'>Thomas Wiesel</h2>
        <h2 class='titre2'>Les interactions sociales</h2>
    </div>
    <div class='programme'>
        <h1 class='titre-programme'><span class='red'>LIVE</span><br>
        <span class='white'>09:00 - 10:00</span></h1>
        <h1 class='nom-emission'>COMEDY CLUB</h1>
        <p class='p1'>Thomas Wiesel</p>
    </div>
    <button id='accesChat'>
        Accéder au chat
    </button>
    <div class='chatTest hidden'>
        <div class='container-chat'>
            <div class='container-message'>
            <h1 class='titre-chat'>Chat en direct</h1>
            <div class='viewer'>
                <!--<img src="img/profil.png" alt="profil" class='profil' height="18.74px" weight="18px"/>-->
                <p>1,2K viewers</p>
            </div>
            <div class='message'>
                <p class='pseudo'>Bedia : </p>
                <p class='texte'>Hahahahah trop drôle !</p>
            </div>
            <div class='message'>
                <p class='pseudo'>Loup-anonyme </p>
                <p class='texte'>Hello tout le monde comment ca va ?</p>
            </div>
            <div class='message'>
                <p class='pseudo'>Squeezie : </p>
                <p class='texte'>Est-ce que c'est bon pour vous ?</p>
            </div>
            <div class='message'>
                <p class='pseudo'>Maghla : </p>
                <p class='texte'>Bonje dois y aller, ciaoooo tout le monde</p>
            </div>
            <div class='message'>
                <p class='pseudo'>Hamilton : </p>
                <p class='texte'>J'adore les voitures</p>
            </div>
            <div class='message'>
                <p class='pseudo'>R7: </p>
                <p class='texte'>Suiiiiii</p>
            </div>
      </div>
      <div class='container-input'>
            <input type='text' placeholder='Chattez publiquement' class='input-message'></input>
            <button class='bouton-chat'>Envoyer</button>
      </div>
        </div>
    </div>
</div>








<script>

    var bouton = document.getElementById('accesChat');
    var chatTest = document.querySelector('.chatTest');



    bouton.addEventListener('click', function() {
        if(chatTest.classList.contains('hidden')) {
           chatTest.classList.remove('hidden');
            bouton.innerHTML = 'Fermer le chat';
        } else {
            chatTest.classList.add('hidden');
            bouton.innerHTML = 'Accéder au chat';
        }
    });

    //ajouter un message
    var boutonChat = document.querySelector('.bouton-chat');
    //container-chat
    var containerChat = document.querySelector('.container-message');


    //quand on clique sur le bouton envoyer
    boutonChat.addEventListener('click', function() {
        //ajouter le message dans le chat
        var inputMessage = document.querySelector('.input-message').value;

        const html = `<div class='message'>
                <p class='pseudo'>Moi : </p>
                <p class='texte'>${inputMessage}</p>
            </div>`;
        
        containerChat.innerHTML += html;
    });

      



    </script>

@endsection
