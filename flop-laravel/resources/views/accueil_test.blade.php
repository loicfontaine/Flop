@extends("template")
@section('css')
<link rel="stylesheet" href="{{asset('css/accueil.css')}}">
@endsection
@section('title')
Accueil | Couleur 3 Interact
@endsection
@section('content')
<!-- <div id="app"></div> -->
<div id="video-container">
    <div id="video">
        <img id="direct-live" src="{{asset('img/directVideo1.jpg')}}" alt="Image">
    </div>
    <div id="video-side">
        <div id="texte-container">
            <div id="texte">
                <h3 class="live red">LIVE</h3>
                <h3 class="live">09:00 - 11:00<h3>
                <h1 class="titre-live">OUI MAIS NON</h1>
                <p class="texte-live">Mickael Marquet, Michel Ndeze, Johannes Tchiakpe et Charles-Adamir Bernhard</p>
            </div>
        </div>
        <div class="bouton" id="audio-live">
            <p>Audio live</p>
        </div>
    </div>      
</div>
<div id="actualite">
    <h1>Actualité</h1>
    <div class="container-article">
        <div class="article">
            <div class="img-article">
                <img class="img" src="{{asset('img/article2.jpg')}}" alt="Article 1">
            </div>
            <div class="text-article">
                <h2 class="titre">Les joueurs mettent les buts, Couleur 3 met l’ambiance!</h2>
                <p>Footaises est de retour à l’occasion des matchs de la Suisse, des 
        demi-finales et de la finale de la Coupe du Monde! Fidèles au poste, Fantin Moreno, Blaise Bersinger et 
        Charles Nouveau vont nous faire vibrer.</p>
            </div>
        </div>
        <div class="article">
            <div class="img-article">
                <img class="img" src="{{asset('img/article1.jpg')}}" alt="Article 1">
            </div>
            <div class="text-article">
                <h2 class="titre">Nouvelle émission radio</h2>
                <p>Le DJ et producteur DC Salas vous fait découvrir le meilleur de la scène belge sur Couleur 3. 
      En collaboration avec Jam, la nouvelle radio musicale de la RTBF, une heure de 
      voyage entre electro, hip hop et tout ce qu'il se passe de passionnant entre deux."</p>
            </div>
        </div>
        <div class="article">
            <div class="img-article">
                <img class="img" src="{{asset('img/article4.jpg')}}" alt="Article 1">
            </div>
            <div class="text-article">
                <h2 class="titre">Ciao Roma !</h2>
                <p>Du 22 au 26 mai, Couleur 3 part à Rome, à la recherche de sa fibre latine. Les clichés sur la pizza et les gondoles? Oui, mais on va quand même essayer de trouver autre chose. En direct de la capitale italienne, nous donnerons la parole à des personnalités des arts, de la science, de la culture, du sport ou de la politique, on écoutera beaucoup de musique.</p>
            </div>
        </div>
    </div>
</div>

<div id="nos-videos">
<h1>Vidéos</h1>
    <div id="video-container2">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/0GDdraChwqg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/x8oiLuEG9sw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <div id="plus-video">
        <a href="https://www.youtube.com/@Couleur3">Plus de vidéos</a>
    </div>
</div>

@endsection