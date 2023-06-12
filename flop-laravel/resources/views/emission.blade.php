@extends('template')
@section('css')
<link rel="stylesheet" href="{{asset('css/emission.css')}}">
@endsection
@section('title')
Live | Couleur 3 Interact
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('js/emission.js')}}"></script>
@endsection
@section('title')
COMEDY CLUB | Couleur 3 Interact
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
            <span class='white'>09:00 - 10:00</span>
        </h1>
        <h1 class='nom-emission'>COMEDY CLUB</h1>
        <p class='p1'>Thomas Wiesel</p>
    </div>
    <button id='accesChat'>
        Accéder au chat
    </button>
    <div class='chatTest hidden'>
        <div class='container-chat'>
            <div class='container-message'>
                <div class="info">
                    <div class="titreDuchat">
                        <h1 class='titre-chat'>Chat en direct</h1>
                    </div>
                    <div class="X">
                        <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d_353_12780)">
                                <path d="M7.99929 0.454545L10.9325 5.41193H11.0462L13.9936 0.454545H17.4666L13.0277 7.72727L17.5661 15H14.0291L11.0462 10.0355H10.9325L7.94957 15H4.42685L8.9794 7.72727L4.51207 0.454545H7.99929Z" fill="white" />
                            </g>
                            <defs>
                                <filter id="filter0_d_353_12780" x="0.426758" y="0.454102" width="21.1394" height="22.5459" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                    <feOffset dy="4" />
                                    <feGaussianBlur stdDeviation="2" />
                                    <feComposite in2="hardAlpha" operator="out" />
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_353_12780" />
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_353_12780" result="shape" />
                                </filter>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class='viewer'>
                    <p>1,2K viewers</p>
                </div>
                <hr class="hrTop">
                <div class="boxMessage">
                    <div class='message'>
                        <p class='pseudo'>Bedia : </p>
                        <p class='texte'>Hahahahah trop drôle !</p>
                    </div>
                    <div class='message'>
                        <p class='pseudo'>Loup-anonyme : </p>
                        <p class='texte'>Hello tout le monde cava?</p>
                    </div>
                    <div class='message'>
                        <p class='pseudo'>Squeezie : </p>
                        <p class='texte'>Est-ce que c'est bon pour vous ?</p>
                    </div>
                    <div class='message'>
                        <p class='pseudo'>Maghla : </p>
                        <p class='texte'>Bon je dois y aller, ciaoooo tout le monde</p>
                    </div>
                    <div class='message'>
                        <p class='pseudo'>Hamilton : </p>
                        <p class='texte'>J'adore les voitures</p>
                    </div>
                    <div class='message'>
                        <p class='pseudo'>R7 : </p>
                        <p class='texte'>Suiiiiii</p>
                    </div>
                </div>
                <hr class="hrBottom">
                @if (Auth::check())
                <div class="nomDeUtilisateur">
                    <div class="svgg">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 15C24 16.5913 23.3679 18.1174 22.2426 19.2426C21.1174 20.3679 19.5913 21 18 21C16.4087 21 14.8826 20.3679 13.7574 19.2426C12.6321 18.1174 12 16.5913 12 15C12 13.4087 12.6321 11.8826 13.7574 10.7574C14.8826 9.63214 16.4087 9 18 9C19.5913 9 21.1174 9.63214 22.2426 10.7574C23.3679 11.8826 24 13.4087 24 15Z" fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.388 32.988C9.38775 32.667 3 26.079 3 18C3 9.7155 9.7155 3 18 3C26.2845 3 33 9.7155 33 18C33 26.2845 26.2845 33 18 33C17.9315 33.0004 17.863 33.0004 17.7945 33C17.6587 33 17.523 32.9955 17.388 32.988ZM8.3745 27.465C8.26235 27.1429 8.22417 26.7997 8.26281 26.4609C8.30145 26.122 8.4159 25.7963 8.59768 25.5077C8.77946 25.2191 9.0239 24.9752 9.31284 24.7941C9.60179 24.6129 9.92782 24.4992 10.2668 24.4613C16.1138 23.814 19.9222 23.8725 25.7407 24.4748C26.0801 24.5101 26.407 24.6224 26.6964 24.8032C26.9858 24.9839 27.2301 25.2283 27.4108 25.5178C27.5915 25.8072 27.7037 26.1341 27.739 26.4735C27.7742 26.8129 27.7316 27.1558 27.6143 27.4762C30.108 24.9532 31.5045 21.5475 31.5 18C31.5 10.5443 25.4557 4.5 18 4.5C10.5443 4.5 4.5 10.5443 4.5 18C4.5 21.687 5.97825 25.029 8.3745 27.465Z" fill="white" />
                        </svg>
                    </div>
                    <div class="nomutilchat">
                        <p class="nomUtil">{{Auth::user()->firstname}}</p>
                    </div>
                </div>
            </div>
            <input type='text' placeholder='Chattez publiquement' class='input-message'></input>
            <button class='bouton-chat'>Envoyer</button>
        </div>
    </div>
    @else
    <div class="nomDeUtilisateur">
        <div class="svgg">
            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24 15C24 16.5913 23.3679 18.1174 22.2426 19.2426C21.1174 20.3679 19.5913 21 18 21C16.4087 21 14.8826 20.3679 13.7574 19.2426C12.6321 18.1174 12 16.5913 12 15C12 13.4087 12.6321 11.8826 13.7574 10.7574C14.8826 9.63214 16.4087 9 18 9C19.5913 9 21.1174 9.63214 22.2426 10.7574C23.3679 11.8826 24 13.4087 24 15Z" fill="white" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.388 32.988C9.38775 32.667 3 26.079 3 18C3 9.7155 9.7155 3 18 3C26.2845 3 33 9.7155 33 18C33 26.2845 26.2845 33 18 33C17.9315 33.0004 17.863 33.0004 17.7945 33C17.6587 33 17.523 32.9955 17.388 32.988ZM8.3745 27.465C8.26235 27.1429 8.22417 26.7997 8.26281 26.4609C8.30145 26.122 8.4159 25.7963 8.59768 25.5077C8.77946 25.2191 9.0239 24.9752 9.31284 24.7941C9.60179 24.6129 9.92782 24.4992 10.2668 24.4613C16.1138 23.814 19.9222 23.8725 25.7407 24.4748C26.0801 24.5101 26.407 24.6224 26.6964 24.8032C26.9858 24.9839 27.2301 25.2283 27.4108 25.5178C27.5915 25.8072 27.7037 26.1341 27.739 26.4735C27.7742 26.8129 27.7316 27.1558 27.6143 27.4762C30.108 24.9532 31.5045 21.5475 31.5 18C31.5 10.5443 25.4557 4.5 18 4.5C10.5443 4.5 4.5 10.5443 4.5 18C4.5 21.687 5.97825 25.029 8.3745 27.465Z" fill="white" />
            </svg>
        </div>
        <div class="nomutilchat">
            <p class="nomUtil">Utilisateur anonyme</p>
        </div>
    </div>
</div>
<input type='text' placeholder='Chattez publiquement' class='input-message hidden'></input>
<button class='bouton-chat hidden'>Envoyer</button>
<div class="connexion">
    <div>
        <p class="texteDeConnexion">Vous n'êtes actuellement pas connecté. Connectez-vous pour pouvoir intéragir sur le chat</h1>
    </div>
    <a href="https://flop-pingouin.heig-vd.ch/login">
        <button type="submit" class="submit" id="sub">Se connecter</button>
    </a>
</div>
</div>
@endif
</div>
</div>

<script>
<<<<<<< HEAD
=======
    if (document.getElementById('sub') != null) {
    var connexionBtn = document.getElementById('sub');

    {
        connexionBtn.addEventListener('click', function() {
            window.location.href = "login";
        });
    }
}

>>>>>>> main
    // Sélectionnez les éléments nécessaires
    const boutonFermer = document.getElementById('accesChat');
    const boutonSvgX = document.querySelector('.X');
    const chat = document.querySelector('.chatTest');
    const programme = document.querySelector('.programme');

    // Ajoutez un écouteur d'événement au bouton d'ouverture du chat
    boutonFermer.addEventListener('click', () => {
        chat.classList.remove('hidden'); // Affiche le chat
        boutonFermer.style.display = 'none'; // Masque le bouton d'ouverture
        programme.style.display = 'none'; // Masque  programme
    });

   
     //ajouter message au chat
    const boxMessage = document.querySelector('.boxMessage');
    const boutonChat = document.querySelector('.bouton-chat');

    @if(Auth::check())
    boutonChat.addEventListener('click', () => {
        const inputMessage = document.querySelector('.input-message').value;
        var html = `<div class='message'>
                        <p class='pseudo'>{{Auth::user()->firstname}} : </p>
                        <p class='texte'>${inputMessage}</p>
                    </div> `;
        boxMessage.innerHTML += html;
        document.querySelector('.input-message').value = '';
    });
    @endif
    


    // Ajoutez un écouteur d'événement au SVG "X"
    boutonSvgX.addEventListener('click', () => {
        chat.classList.add('hidden'); // Masque le chat
        boutonFermer.style.display = 'block'; // Affiche le bouton d'ouverture
        programme.style.display = 'block'; // Affiche programme
    });
</script>

@endsection