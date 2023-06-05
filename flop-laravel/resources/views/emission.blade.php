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
</div>
<div class='hidden chatTest'>
    <h1 class='blanc'>Chat</h1>
</div>

<div id='chat' class='hidden'>
    <div class="card">
        <div class="card-header">Chats</div>
        <div class="card-body">
            <chat-messages :messages="messages"></chat-messages>
        </div>
        <div class="card-footer">
            <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
        </div>
    </div>
</div>



<script>
    var bouton = document.getElementById('accesChat');
    var chat = document.getElementById('chat');

    bouton.addEventListener('click', function() {
        if(chat.classList.contains('hidden')) {
            chat.classList.remove('hidden');
            bouton.innerHTML = 'Fermer le chat';
        } else {
            chat.classList.add('hidden');
            bouton.innerHTML = 'Accéder au chat';
        }
    });
      



    </script>

@endsection
